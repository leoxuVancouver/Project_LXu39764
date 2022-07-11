<?php

// NOTICE THE CHANGES IN PDOWRAPPER's FUNCTION NAMES: getSingleResult() and getSetResult()

class UserDAO
{

    // Create a member to store the PDO agent
    private static $db;
    // create the init function to start the PDO wrapper
    static function initialize(string $className)
    {
        self::$db = new PDOWrapper($className);
    }


    // function to create user
    static function createUser(User $user)
    {
      
        $sql = "INSERT INTO users (email, password, nickname, gender,phone)
        VALUES (:email, :password, :nickname, :gender,:phone)";

        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':email', $user->getEmail());
        self::$db->bind(':password', password_hash($user->getPassword(),PASSWORD_DEFAULT));
        self::$db->bind(':nickname', $user->getnickname());
        self::$db->bind(':gender', $user->getgender());
        self::$db->bind(':phone', $user->getphone());

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertedId();
    }

    // get user detail
    static function getUser(string $email)
    {

        $selectSQL = "SELECT * FROM users WHERE email = :email;";
        self::$db->query($selectSQL);
        self::$db->bind(":email", $email);
        self::$db->execute();
        return self::$db->singleResult();
    }



    // update the current user profile
    // certainly you don't have the form to facilitate this
    // so, it is not needed in our app, but hey.. more practice is better!
    static function updateUser(User $user)
    {
        
        $sql = "UPDATE users 
                SET  email=:email,password=:password, nickname=:nickname, gender=:gender,phone=:phone
                WHERE  id=:id";
        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':id', $user->getId());
        self::$db->bind(':email', $user->getEmail());
        self::$db->bind(':password', password_hash($user->getPassword(),PASSWORD_DEFAULT));
        self::$db->bind(':nickname', $user->getnickname());
        self::$db->bind(':gender', $user->getgender());
        self::$db->bind(':phone', $user->getphone());

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertedId(); 

    }

    // get multiple users detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getUsers()
    {

        $selectSQL = "SELECT * FROM users";
        self::$db->query($selectSQL);
        self::$db->execute();
        return self::$db->getResultSet();
    }
}
