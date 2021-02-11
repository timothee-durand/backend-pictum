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

include('./cribm_ldap_api.class_2.php');

$ldap_api=new cribm_ldap_api();


echo '<hr> ListeGroup :<pre>'.
        print_r(
                $ldap_api->getCRIBM_LDAP_allGroupName()
                ,true).
        '</pre><hr>';


echo ' Un UID :<pre>'.
        print_r(
                $ldap_api->getCRIBM_LDAP_InfoUID('cbloch')
                ,true).
        '</pre><hr>';

echo 'Un Group :<pre>'.
        print_r(
        $ldap_api->getCRIBM_LDAP_InfoGroup('info')
        ,true).
        '</pre><hr>';

echo 'Un Group 1ere Année :<pre>'.
        print_r(
        $ldap_api->getCRIBM_LDAP_InfoGroup('info.dut.1ereAnnee')
        ,true).
        '</pre><hr>';

echo 'Un Recherche LDAP :<pre>'.
        print_r(
        $ldap_api->getCRIBM_LDAP_SearchLDap('(mail=fa*)')
        ,true).
        '</pre><hr>';





?>
