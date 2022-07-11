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

if(empty($_POST)){
  


    if(LoginManager::verifyLogin()){

        // get the user detail
        UserDAO::initialize("User");
        $user = UserDAO::getUser($_SESSION['loggedin']);
        Page::showHeader();
        Page::showUser($user);
        Page::showFooter();
    
    }else{
        header("Location: Project_login_LXu39674.php");
        exit;
    }
}else{
    if(Validate::validateRegisterForm()){
        UserDAO::initialize("User");
        //title,province,city,address,mTime,mDay,userId
        $_SESSION['loggedin']=$_POST['email'];
        $nu=new User();
        $nu->setId($_SESSION['userId']);
        $nu->setEmail($_POST['email']);
        $nu->setPassword($_POST['password']);
        $nu->setNickname($_POST['nickname']);
        $nu->setPhone($_POST['phone']);
        $nu->setGender($_POST['gender']);
        UserDAO::updateUser($nu);
        header("Location: Project_meetup_LXu39674.php");
        exit;  
    }else{
        UserDAO::initialize("User");
        $user = UserDAO::getUser($_SESSION['loggedin']);
        Page::showHeader();
        Page::showUser($user);
        Page::showFooter(); 
    }
    
}

?>