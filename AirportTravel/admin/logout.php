<?php

/**
 * developed by gabriel tendai musodza.
 * Date: 30/03/2020
 * Time: 13:37
 */
session_start();

session_destroy();
$_SESSION["loggedin"] = false;

header("Location: index.php");

exit;
