<?php

/**
 * Description of cribm_ldap_api
 *
 * this librairie is for client api ldap
 *
 * @author Cedric Michelot <cedric.michelot@univ-fcomte.fr>
 * @license GPL
 * @date 2020-12-07
 * @version 0.1
 * @todo
 */
class cribm_ldap_api {


    // ---------- variables ---------- //

        /**
         * @var string the method use to synchronise crypt
         */
        static private $method = 'AES-256-CBC';


        /**
         *
         * @var string the config file set to default
         */
        private $configFile= __DIR__.'/config/default.json';

        /**
         *
         * @var string array : the config
         */
        private $config=[];

    // ---------- /variables ---------- //




    // ---------- Methods ---------- //

        // ---------- decrypt method ---------- //
            /**
             *
             * @param type $encryptedJsonData : the json form of encrypted data
             * @param type $privateKey  : the private key to decode the encrypted data
             * @return string : the decrypted data
             */
            private function largeDataDecrypt($encryptedJsonData,$privateKey){
                $encryptedData= json_decode($encryptedJsonData,TRUE);
                // decrypte the key
                openssl_private_decrypt(base64_decode($encryptedData['key']), $decryptedKey, $privateKey);
                return($this->synchronousDecrypt($encryptedData['data'], $decryptedKey));
            }


            /**
             * this function uncrypt Data with key
             * @param string $encryptedData
             * @param string $key
             * @return string
             */
            private function  synchronousDecrypt($encryptedData,$key){
                list($data, $iv) = explode('|', $encryptedData);
                $iv = base64_decode($iv);
                return(openssl_decrypt($data, self::$method, $key, 0, $iv));
            }
        // ---------- /decrypt method ---------- //

        // ---------- internal method ---------- //
            /**
             * this method get config file data
             * @param string $configFile
             * @return string array of distinct config information
             */
            private function getConfigData($configFile=FALSE){
                if(empty($this->config)){
                    // get file content
                    if(!$configFile){
                        $configFile=$this->configFile;
                    }
                    //echo "test".json_encode(file_exists($configFile))."path".$configFile;
                    if(is_file($configFile)){
                        $this->config= json_decode(file_get_contents($configFile),TRUE);

                    }
                }
                return($this->config);
            }

            /**
             * this method make request to ldap_api server using config url
             *
             * @param string $action the action to get
             * @param string $request data to use for request
             * @param string $configFile the config file to use if not the default one ( usefull for multiple config )
             * @return string array
             */
            private function makeRequest($action,$request,$configFile=FALSE){
                $config=$this->getConfigData();
                $url=$config['appUrl'].'?app_name='.$config['appName'].'&action='.$action.'&request='.$request;
                @$jsonDataEncrypted= file_get_contents($url);
                if($jsonDataEncrypted){
                    return(json_decode($this->largeDataDecrypt($jsonDataEncrypted, $config['privKey']),TRUE));
                }
                return(FALSE);
            }


        // ---------- /internal method ---------- //


        // ---------- call method  ---------- //
            /**
             * this method return info from one uid
             *
             *
             * @param string $uid the uid ( login ) search
             * @param string $configFile optionnal config file for multiple config
             * @return string array
             */
            public function getCRIBM_LDAP_InfoUID($uid,$configFile=FALSE){
                return($this->makeRequest("getUID", $uid,$configFile));
            }

            /**
             * return all user info present in this group
             *
             * @param string $groupName
             * @param string $configFile optionnal config file for multiple config
             * @return string array
             */
            public function getCRIBM_LDAP_InfoGroup($groupName,$configFile=FALSE){
                return($this->makeRequest("getGroup", $groupName,$configFile));
            }

            /**
             * return all user info from search
             *
             * using a ldap syntax search like
             * (sn=a*)
             * (mail=john.doe@univ-fcomte.fr)
             *
             *
             * @param string $searchLDAP the search
             * @param string $configFile optionnal config file for multiple config
             * @return string array
             */
            public function getCRIBM_LDAP_SearchLDap($searchLDAP,$configFile=FALSE){
                return($this->makeRequest("search", $searchLDAP,$configFile));
            }
        // ---------- /call method  ---------- //



    // ---------- /Methods ---------- //

}

// /cribm_ldap_api
