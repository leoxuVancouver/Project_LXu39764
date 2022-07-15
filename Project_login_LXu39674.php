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

//Check if the form was posted
if(!empty($_POST)){
    
    //Initialize the DAO

    UserDAO::initialize("User");
    //Get the current user 

    $user=UserDAO::getUser($_POST['email']);
   
    //if there is no such user, update the page notifications
    if(!$user){
        Page::$notifications[]="Wrong username or password";
    }
    //otherwise, check the DAO if it returns an object of type user
    else{
        if(get_class($user)=="User"){
        
            if($user->verifyPassword($_POST['password'])){
                // start the session
                session_start();
        
                // register the session loggedin
                $_SESSION['loggedin'] = $user->getEmail();
                $_SESSION['nickname'] = $user->getNickname();
                $_SESSION['userId'] = $user->getId();
            }else{
                Page::$notifications[]="Wrong username or password"; 
            }


        }
    }
    
            
       
    }

    if(LoginManager::verifyLogin()){
        
    
        header("Location: Project_meetup_LXu39674.php");
        exit;
    }else{
        Page::showHeader();
        Page::showLogin();
        Page::showFooterLogout();
    }
            

?>