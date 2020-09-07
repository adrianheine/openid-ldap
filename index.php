<?php
// IF YOU HAVE NOT DONE SO, PLEASE READ THE README FILE FOR DIRECTIONS!!!

/**
 * OpenID-LDAP-PHP
 * An open source PHP-based OpenID IdP package using LDAP as backend.
 *
 * By Zdravko Stoychev <zdravko (at) 5group (dot) com> aka Dako.
 * Copyright 1996-2011 by 5Group & Co. http://www.5group.com/
 * See LICENSE file for more details.
 */

(include 'config.php') || die("config.php not found");

/**
 * Simple Registration Extension
 * @name $sreg
 * @global array $GLOBALS['sreg']
 * DO NOT ENABLE OR EDIT ARRAY ENTRIES! Call to find_ldap() bellow will populate them!
 */
$GLOBALS['sreg'] = array (
#       'nickname' => 'Joe',
#       'email' => 'joe@example.com',
#       'fullname' => 'Joe Example',
#       'dob' => '1970-10-31',
#       'gender' => 'M',
#       'postcode' => '22000',
#       'country' => 'US',
#       'language' => 'en',
#       'timezone' => 'America/New_York'
);

require 'ldap.php';
find_ldap($userid); // lookup user and populate sreg info
require 'engine.php';
