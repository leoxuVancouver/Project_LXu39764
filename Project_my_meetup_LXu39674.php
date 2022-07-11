<?php

// require once all the files
require_once('inc/config.inc.php');
require_once('inc/Entity/Page.class.php');
require_once('inc/Entity/Meetup.class.php');
require_once('inc/Entity/Meetup.class.php');
require_once('inc/Entity/Meetup_users.class.php');
require_once('inc/Utility/LoginManager.class.php');
require_once('inc/Utility/PDOWrapper.class.php');
require_once('inc/Utility/MeetupDAO.class.php');
require_once('inc/Utility/Validate.class.php');
require_once('inc/Utility/FileUtility.class.php');
require_once('inc/Utility/MeetupDao.class.php');
require_once('inc/Utility/MeetupUserDao.class.php');
require_once('inc/Utility/JoinStatus.class.php');

//Start the session
session_start();

if(empty($_POST)){



    if(LoginManager::verifyLogin()){


        MeetupDAO::initialize("Meetup");
        $myMeetups = MeetupDAO::getMeetupByUser($_SESSION['userId']);
    
    
        Page::showHeader();
        Page::showMyMeetupList($myMeetups);
        Page::showFooter();

        
    
    }else{
        header("Location: Project_login_LXu39674.php");
        exit;
    }
}else{
   
    header("Location: Project_create_meetup_LXu39674.php");
    exit;  
    

}



?>