<?php

// NOTICE THE CHANGES IN PDOWRAPPER's FUNCTION NAMES: getSingleResult() and getSetResult()

class MeetupUserDAO
{
    // id  ;title; $province;		$city; $address;	$mTime;$mDay;$userId;

    // Create a member to store the PDO agent
     static $db;
    // create the init function to start the PDO wrapper
    static function initialize(string $className)
    {
        self::$db = new PDOWrapper($className);
    }


    // function to create Meetup
    static function createMeetupUsers(Meetup_users $MeetupUsers)
    {
    
        $sql = "INSERT INTO Meetup_users (userId,meetupId)
        VALUES (:userId,:meetupId)";
        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':userId', $MeetupUsers->getUserId());
        self::$db->bind(':meetupId', $MeetupUsers->getMeetupId());
       

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertedId();
    }


    static function deleteMeetupUsers($userId,$meetupId) : bool {
        $sql = "DELETE FROM Meetup_users WHERE userId = :userId and meetupId=:meetupId";

        try{
            self::$db->query($sql);
            self::$db->bind(':userId', $userId);
            self::$db->bind(':meetupId', $meetupId);
            self::$db->execute();

            if(self::$db->rowCount() != 1){
                throw new Exception("Problem deleting record");
            }
        }catch(Exception $exc){
            echo $exc->getMessage();
            return false;
        }

        return true;


    }

    static function getMeetupUsers() {        
        $sql = "SELECT * from meetup_users";
        
        self::$db->query($sql);
        self::$db->execute();

        return self::$db->getSetResult();
    }

   
    static function getMeetupUser($userId,$meetupId){        
        $sql = "SELECT * from meetup_users 
                WHERE userId = :userId and meetupId=:meetupId";
        
        self::$db->query($sql);
        self::$db->bind(':userId', $userId);
        self::$db->bind(':meetupId', $meetupId);
        self::$db->execute();

        return self::$db->singleResult();
    }


    
}
