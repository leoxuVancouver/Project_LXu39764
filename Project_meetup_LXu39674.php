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
require_once('inc/Utility/AttendeeCount.class.php');

//Start the session
session_start();

if(empty($_POST)){
  


    if(LoginManager::verifyLogin()){

        // get the Meetup detail
        MeetupDAO::initialize("Meetup");
        $meetups = MeetupDAO::getMeetups();
        MeetupUserDAO::initialize("Meetup_users");
        if(isset($_GET['action'])&&$_GET['action']=="join"){
            $nmu=new Meetup_users();
            $nmu->setUserId($_SESSION['userId']);
            $nmu->setMeetupId($_GET['meetupId']);
            MeetupUserDAO::initialize("Meetup_users");
            MeetupUserDAO::createMeetupUsers($nmu);
        }
        if(isset($_GET['action'])&&$_GET['action']=="cancel"){
            MeetupUserDAO::deleteMeetupUsers($_SESSION['userId'],$_GET['meetupId']);
        }
        $meetupUsers=MeetupUserDao::getMeetupUsers();
        JoinStatus::check($meetups,$meetupUsers);
        AttendeeCount::count($meetups,$meetupUsers);
//
        
        //
        Page::showHeader();
        Page::showMeetupList($meetups);
        Page::showFooterLogin();
    }else{
        header("Location: Project_login_LXu39674.php");
        exit;
    }

}else{   
    if(isset($_POST['search'])&&$_POST['search']=="search"){
        MeetupDAO::initialize("Meetup");
        $meetups = MeetupDAO::getMeetupByTitle($_POST['searchTitle']);
        MeetupUserDAO::initialize("Meetup_users");
        $meetupUsers=MeetupUserDao::getMeetupUsers();
        JoinStatus::check($meetups,$meetupUsers);
        AttendeeCount::count($meetups,$meetupUsers);
        //
        Page::showHeader();
        Page::showMeetupList($meetups);
        Page::showFooterLogin();


    }  else{
        header("Location: Project_create_meetup_LXu39674.php");
        exit; 
    }
     
}
