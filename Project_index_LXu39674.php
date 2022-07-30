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


    

        session_start();


  


    if(LoginManager::verifyLogin()){

        
        Page::showHeader();
        Page::showWelcome();
        Page::showFooterLogin();
    
    }else{
        Page::showHeader();
        Page::showWelcome();
        Page::showFooterLogout();
    }


            

?>