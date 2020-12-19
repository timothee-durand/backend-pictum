<?php

include('cribm_ldap_api.class.php');

function getInfoLDAP($username) {
    $ldap_api=new cribm_ldap_api();
    return $ldap_api->getCRIBM_LDAP_InfoUID($username);
}

function getInfoLDAPByMail($mail) {
    $ldap_api=new cribm_ldap_api();
    return $ldap_api->getCRIBM_LDAP_SearchLDap("(mail=".$mail.")");
}

