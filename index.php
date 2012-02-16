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

// Get username from request URL. Remove any leading /
$userid = ltrim($_REQUEST['user'],'/');

/**
 * User profile
 * @name $profile
 * @global array $GLOBALS['profile']
 */
$GLOBALS['profile'] = array(
	# Basic Config - Required
	'auth_username'	=> 	$userid, // user logon name
	'auth_cn'	=>	$userid, // user CN value, see ldap['lookupcn']

	# Optional Config - Please see README before setting these
#	'microid'	=>	array('mailto:user@site', 'http://delegator'),
#	'pavatar'	=>	'http://your.site.com/path/pavatar.img',

	# Advanced Config - Please see README before setting these
#	'allow_gmp'	=>	false,
#	'allow_test'	=> 	false,
#	'auth_realm'	=>	'OpenID',
#	'force_bigmath'	=>	false,
#	'idp_url'	=>	'http://your.site.com/path',
#	'lifetime'	=>	1440,
#	'paranoid'	=>	false, # EXPERIMENTAL
#	'force_ssl'	=>	false, # EXPERIMENTAL

	# Logging Config - Please see README before setting these
#	'debug'		=>	false,
#	'authlog'	=>	false,
#	'logfile'	=>	'/var/log/openid'
);

/**
 * Simple Registration Extension
 * @name $sreg
 * @global array $GLOBALS['sreg']
 * DO NOT ENABLE OR EDIT ARRAY ENTRIES! Call to find_ldap() bellow will populate them!
 */
$GLOBALS['sreg'] = array (
#       'nickname'              => 'Joe',
#       'email'                 => 'joe@example.com',
#       'fullname'              => 'Joe Example',
#       'dob'                   => '1970-10-31',
#       'gender'                => 'M',
#       'postcode'              => '22000',
#       'country'               => 'US',
#       'language'              => 'en',
#       'timezone'              => 'America/New_York'
);

/**
 * Some HTML templates
 * @name @html
 * @global array $GLOBALS['html']
 */
$GLOBALS['html'] = array (
	'page_head' 		=> '<link href="style.css" rel="stylesheet" type="text/css" /><link rel="SHORTCUT ICON" href="images/openid.ico" />',
	'page_title'		=> 'OpenID Provider',
	'page_header'		=> '<img src="images/logo.gif" border="0"><br/>This is our <a href="http://openid.net/">OpenID</a> Provider endpoint.',
	'seatbelt_text'		=> 'Our OpenID Provider endpoint.',
	'welcome_text'		=> 'Dear, employee, as a valued member of our company you have an unique identifier (<font color="#FB6000"><b>%s</b></font>, for example). You can then use this identifier to log on to all Web sites that are OpenID-enabled (over 450 and counting, see the <a href="http://openiddirectory.com">Directory</a> for a partial listing of the sites). Please enter your company username bellow to find out what is your identifier. In order to login you have to provide your company password. If you do not have one yet, contact the Systems administartors.<br/><form method="post" action="showme.php">Username: <input type="text" id="login" class="loginurl" name="login"> <input type="submit" name="submit" value="Enter"></form>', // note "%s" which represents example OpenID
	'welcome_help'		=> 'You can find more information at <a href="http://openid.net/">http://openid.net/</a>.',
	'user_not_found'	=> 'User "%s" is not found in our database, sorry.' // note "%s" is username here
);


require('ldap.php');
find_ldap($userid); // lookup user and populate sreg info

require('engine.php');
?>
