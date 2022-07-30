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

if(LoginManager::verifyLogin()){
    Page::showHeader();
    echo "<h3 class='text-success'>Thank you for your visit  <i>".$_SESSION['nickname']."</i>! </h3>";
    Page::showFooterLogout();
    unset($_SESSION['loggedin']);
    unset($_SESSION['nickname']);
    unset($_SESSION['userId']);
// destroy it
session_destroy();

}else{
    header("Location: Project_login_LXu39674.php");
    exit;
}
