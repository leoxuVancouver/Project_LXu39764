<?php

// See the textbook CH 9 for more information about string functions

class Validate {
    static $valid_status=[];
    
    
    // Email should be email format

    // password
        // should be a 7 digits string
        // both password and password confirm needs to be exactly similar
    
    // Avatar name should not be empty
        // Also replace occurences of semicolon, colon, comma, ampersand,
        // dollar sign, < and > and any improper character with nothing

    // Guild name should not be empty

    // One of the affiliation should be selected

    // One of the avatar images must be chosen

    // the function should update the page's notifications
    // you can also return some value to the calling function
 
    
    
    static function validateRegisterForm()    {    
        
       
        // $newUser->setEmail($_POST['email']);
        // $newUser->setPassword($_POST['password']);
        // $newUser->setNickname($_POST['nickname']);
        // $newUser->setGender($_POST['gender']);
        // $newUser->setPhone($_POST['phone']);
        
        $validateEmail=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL); 
        if(!$validateEmail){
            self::$valid_status['email']="input valid email";
        }else{
            UserDAO::initialize("User");
            if(UserDao::getUser($_POST['email'])){
                self::$valid_status['email']="email has been used";
            }
            
        }
        //
      
        

        if(!isset($_POST['nickname'])){
            self::$valid_status['nickname']="nickname require";
        }
        if(!isset($_POST['gender'])){
            self::$valid_status['gender']="genderrequire";
        }
        

       
        $options=['options'=>['regexp'=>'/^\d{7}$/']];
        $validatePassword=filter_input(INPUT_POST,'password',FILTER_VALIDATE_REGEXP,$options); 
        if(!$validatePassword){
            self::$valid_status['password']="wrong password";
        }
        $validatePassword2=filter_input(INPUT_POST,'password2',FILTER_VALIDATE_REGEXP,$options); 
        if(!$validatePassword2){
            self::$valid_status['password2']="wrong password confirm";
        }
        
        if($validatePassword&&$validatePassword2&&($_POST['password']!=$_POST['password2'])){
            self::$valid_status['passwordmatch']="password does not match"; 
        }

        $options=['options'=>['regexp'=>'/^\d{9}$/']];
        $validatePhone=filter_input(INPUT_POST,'phone',FILTER_VALIDATE_REGEXP,$options); 
        if(!$validatePhone){
            self::$valid_status['phone']="wrong phone no";
        }



      

        Page::$notifications=self::$valid_status;
        if(empty(self::$valid_status))
            return true;
        else
            return false;
        
    }
}




?>