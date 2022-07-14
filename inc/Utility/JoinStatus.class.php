<?php

class JoinStatus
{
    
   
    static function check($meetups)
    {
       if(gettype($meetups)=='array'){
        foreach($meetups as $meetup){
            if(MeetupUserDAO::getMeetupUser($_SESSION['userId'],$meetup->getId())){
                $joined=true;
            }else{
                $joined=false;
            }
            $meetup->joined=$joined;
        }
         }else{
            if(MeetupUserDAO::getMeetupUser($_SESSION['userId'],$meetups->getId())){
                $joined=true;
            }else{
                $joined=false;
            }
            $meetups->joined=$joined;
         }

    }
}
