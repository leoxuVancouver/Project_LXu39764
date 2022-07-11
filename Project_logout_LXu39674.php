<?php

// require once all the files
require_once('inc/config.inc.php');
require_once('inc/Entity/Page.class.php');
require_once('inc/Entity/User.class.php');
require_once('inc/Entity/Meetup.class.php');
require_once('inc/Entity/Meetup_users.class.php');
require_once('inc/Utility/LoginManager.class.php');
require_once('inc/Utility/PDOWrapper.class.php');
require_once('inc/Utility/UserDAO.class.php');
require_once('inc/Utility/Validate.class.php');
require_once('inc/Utility/FileUtility.class.php');
require_once('inc/Utility/MeetupDao.class.php');

//Start the session
session_start();

Page::showHeader();
echo "<p>Thank you for your visit  ".$_SESSION['nickname']."! </p>";
Page::showFooter();
unset($_SESSION['loggedin']);
unset($_SESSION['nickname']);
unset($_SESSION['userId']);
// destroy it
session_destroy();



?>