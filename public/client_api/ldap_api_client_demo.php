<?php

/**
 * short description of ldap_api_client
 *
 * the long description
 *
 * @author Cedric Michelot <cedric.michelot@univ-fcomte.fr>
 * @date 2020-12-07
 * @license GPL
 * @version 0.1
 * @todo
 *

 */
// put your code here

include('./cribm_ldap_api.class.php');

$ldap_api=new cribm_ldap_api();



$demo1=$ldap_api->getCRIBM_LDAP_InfoUID('tdura');
echo '<hr><h1>Demo1</h1><pre> ' . print_r($demo1, true) . '</pre>';


$demo2=$ldap_api->getCRIBM_LDAP_InfoGroup('etudiant');
echo '<hr><h1>Demo2</h1><pre> ' . print_r($demo2, true) . '</pre>';


$demo3=$ldap_api->getCRIBM_LDAP_SearchLDap('(mail=fa*)');
echo '<hr><h1>Demo3</h1><pre> ' . print_r($demo3, true) . '</pre>';






?>
