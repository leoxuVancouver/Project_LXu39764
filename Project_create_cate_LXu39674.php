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

//Start the session
session_start();

if(empty($_POST)){
  


    if(LoginManager::verifyLogin()){

        // get the Meetup detail
        
        Page::showHeader();
        Page::createCategory();
        Page::showFooter();
    
    }else{
        header("Location: Project_login_LXu39674.php");
        exit;
    }
}else{  
    
    if(isset($_POST['upload'])&&$_POST['upload']=='upload'){
        FileUtility::upload();
    }else{
     FileUtility::write();
    }

    Page::showHeader();
    Page::createCategory();
    Page::showFooter(); 
}
