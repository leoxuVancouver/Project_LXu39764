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
require_once('inc/Utility/DataParse.class.php');
//Start the session
session_start();

if(empty($_POST)){
  


    if(LoginManager::verifyLogin()){

        // get the Meetup detail
        MeetupDAO::initialize("Meetup");
        $content=FileUtility::read();
        $categories=DataParse::strToArray($content);
        Page::showHeader();
        Page::createMeetup($categories);
        Page::showFooter();
    
    }else{
        header("Location: Project_login_LXu39674.php");
        exit;
    }
}else{   
    MeetupDAO::initialize("Meetup");
    //title,province,city,address,mTime,mDay,userId
    $nm=new Meetup();
    $nm->setUserId($_SESSION['userId']);
    $nm->setTitle($_POST['title']);
    $nm->setCategory($_POST['category']);
    $nm->setProvince($_POST['province']);
    $nm->setcity($_POST['city']);
    $nm->setProvince($_POST['province']);
    $nm->setaddress($_POST['address']);
    $nm->setmTime($_POST['mTime']);
    $nm->setmDay($_POST['mDay']);
    $nm->setuserId($_SESSION['userId']);
    MeetupDAO::createMeetup($nm);
    header("Location: Project_my_meetup_LXu39674.php");
    exit;  
}
