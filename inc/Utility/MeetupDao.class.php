<?php

// NOTICE THE CHANGES IN PDOWRAPPER's FUNCTION NAMES: getSingleResult() and getSetResult()

class MeetupDAO
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
    static function createMeetup(Meetup $Meetup)
    {
    
        $sql = "INSERT INTO Meetups (title,category, province, city, address,mTime,mDay,userId)
        VALUES (:title,:category, :province, :city, :address,:mTime,:mDay,:userId)";
        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':title', $Meetup->gettitle());
        self::$db->bind(':category', $Meetup->getcategory());
        self::$db->bind(':province', $Meetup->getProvince());
        self::$db->bind(':city', $Meetup->getcity());
        self::$db->bind(':address', $Meetup->getaddress());
        self::$db->bind(':mTime', $Meetup->getmTime());
        self::$db->bind(':mDay', $Meetup->getmDay());
        self::$db->bind(':userId', $Meetup->getUserId());

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertedId();
    }

    // get Meetup detail
    static function getMeetupByUser($userId)
    {

        $selectSQL = "SELECT * FROM Meetups WHERE userId = :userId;";
        self::$db->query($selectSQL);
        self::$db->bind(":userId", $userId);
        self::$db->execute();
        return self::$db->getSetResult();
    }



    // update the current Meetup profile
    // certainly you don't have the form to facilitate this
    // so, it is not needed in our app, but hey.. more practice is better!
    static function updateMeetup(Meetup $Meetup)
    {

        // you know the drill
        // you may return the rowCount        

    }

    // get multiple Meetups detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getMeetups()
    {

        $selectSQL = "SELECT * FROM Meetups";
        self::$db->query($selectSQL);
        self::$db->execute();
        return self::$db->getSetResult();
    }
}