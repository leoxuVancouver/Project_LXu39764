<?php

//  $id;	 $email; $password;		 $avatar_name; $avatar; $guild_name; $affiliation;	

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
    if(Validate::validateRegisterForm()){
        UserDAO::initialize("User");
        $newUser=new User();
        $newUser->setEmail($_POST['email']);
        $newUser->setPassword($_POST['password']);
        $newUser->setNickname($_POST['nickname']);
        $newUser->setGender($_POST['gender']);
        $newUser->setPhone($_POST['phone']);
        UserDAO::createUser($newUser);
        header("Location: Project_login_LXu39674.php");
        exit;
    };
}

    // If the form entries are valid
        // initialize the DAO

        // instantiate a new user
        // assemble the user data
        // create the user
        // send/redirect the user to the login page
    
    
// Display the page elements and registration form (with updated page notifications if any)

Page::showHeader();
Page::showRegistration();
Page::showFooter();



?>