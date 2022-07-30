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
require_once('inc/Utility/DataParse.class.php');

//Start the session
session_start();

if(empty($_POST)){
  
 // id  ;title; $province;		$city; $address;	$mTime;$mDay;$userId;

    if(LoginManager::verifyLogin()){

        // get the Meetup detail
        MeetupDAO::initialize("Meetup");
        $meetup= MeetupDAO::getMeetupById($_GET['meetupId']);
        $content=FileUtility::read();
        $categories=DataParse::strToArray($content);
        Page::showHeader();
        Page::editMeetup($meetup,$categories);
        Page::showFooterLogin();
    
    }else{
        header("Location: Project_login_LXu39674.php");
        exit;
    }
}else{// id  ;title; province;	city; address;	mTime;mDay;userId;
    if(Validate::validateMeetupForm()){
        MeetupDAO::initialize("Meetup");
        //title,province,city,address,mTime,mDay,MeetupId

        $nm=new Meetup();
        $nm->setId($_POST['meetupId']);
        $nm->settitle($_POST['title']);
        $nm->setCategory($_POST['category']);
        $nm->setprovince($_POST['province']);
        $nm->setcity($_POST['city']);
        $nm->setaddress($_POST['address']);
        $nm->setmTime($_POST['mTime']);
        $nm->setmDay($_POST['mDay']);
        MeetupDAO::updateMeetup($nm);
        Page::$notifications[]="user information is updated";
        header("Location: Project_meetup_LXu39674.php");
        exit;  
    }else{
        MeetupDAO::initialize("Meetup");
        $meetup= MeetupDAO::getMeetupById($_POST['meetupId']);
        $content=FileUtility::read();
        $categories=DataParse::strToArray($content);
        Page::showHeader();
        Page::editMeetup($meetup,$categories);
        Page::showFooterLogin();  
    }
    
}

?>