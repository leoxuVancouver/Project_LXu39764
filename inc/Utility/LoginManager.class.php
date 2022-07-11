<?php

class LoginManager
{

    //This function checks if the user is logged in, if they are not they are redirected to the login page
    static function verifyLogin()
    {

      
        // check for a session
        if (session_id() == '' && !isset($_SESSION)) {
            // start the session
            session_start();
        }

        // check if anybody is loggedin
        if (isset($_SESSION['loggedin'])) {
            return true;
        } else {
            // destroy the session
            session_destroy();

            return false;
        }
    }
}
