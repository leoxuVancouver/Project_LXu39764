<?php

class JoinStatus
{
    
   
    static function check($meetups,$meetupUsers)
    {
       
        foreach($meetups as $meetup){
            if(MeetupUserDAO::getMeetupUser($_SESSION['userId'],$meetup->getId())){
                $joined=true;
            }else{
                $joined=false;
            }
            $meetup->joined=$joined;
        }

    }
}
