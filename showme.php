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

// This code runs if the form has been submitted
if (isset($_POST['submit'])) {

    // Get username from POST request
    $userid = trim($_POST['login']);
    if ($userid == "") {
        $userid = 'index.php';
    }

    // Redirect to nwe URL
    header('Location: ' . $userid);

    echo '<html>
<head>
    <title>...</title>
    <meta http-equiv="refresh" content="0;url=' . $userid . '">
</head>
<body>
    <p>Redirecting to <a href="' . $userid . '">' . $userid . '</a></p>
</body>
</html>';

} else {

    // Show error message
    echo 'You can not use this page directly';
}
?>
