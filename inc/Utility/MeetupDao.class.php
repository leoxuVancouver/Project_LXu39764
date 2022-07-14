<?php

// NOTICE THE CHANGES IN PDOWRAPPER's FUNCTION NAMES: getSingleResult() and getSetResult()

class MeetupDAO
{
   

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

    static function getMeetupById($meetupId)
    {

        $selectSQL = "SELECT * FROM meetups WHERE id = :meetupId;";
        self::$db->query($selectSQL);
        self::$db->bind(":meetupId", $meetupId);
        self::$db->execute();
        return self::$db->singleResult();
    }

    static function getMeetupByAttend($userId)
    {

        $selectSQL = "SELECT m.* FROM meetups m
                      join meetup_users ms
                      on ms.meetupId=m.id
                      where ms.userId=2";
        self::$db->query($selectSQL);
        // self::$db->bind(":userId", $userId);
        self::$db->execute();
        return self::$db->singleResult();
    }



    // update the current Meetup profile
    // certainly you don't have the form to facilitate this
    // so, it is not needed in our app, but hey.. more practice is better!
    static function updateMeetup(Meetup $Meetup)
    {
        $sql = "UPDATE Meetups  
        SET title=:title,category=:category, province=:province, city=:city, address=:address,
        mTime=:mTime,mDay=:mDay
        WHERE id=:id";
        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':id', $Meetup->getId());
        self::$db->bind(':title', $Meetup->gettitle());
        self::$db->bind(':category', $Meetup->getcategory());
        self::$db->bind(':province', $Meetup->getProvince());
        self::$db->bind(':city', $Meetup->getcity());
        self::$db->bind(':address', $Meetup->getaddress());
        self::$db->bind(':mTime', $Meetup->getmTime());
        self::$db->bind(':mDay', $Meetup->getmDay());

        // execute the query
        self::$db->execute();

        return self::$db->rowCount(); 

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

//
    static function deleteMeetup($meetupId) : bool {
        $sql = "DELETE FROM meetups WHERE Id=:meetupId";

        try{
            self::$db->query($sql);
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
}
