<?php

class AttendeeCount
{
    
   
    static function count($meetups)
    {
       if(gettype($meetups)=='array'){
        foreach($meetups as $meetup){
            $ac=MeetupUserDAO::countMeetupUser($meetup->getId());
            
            $meetup->attendeeCount=$ac;
        }
         }else{
            $ac=MeetupUserDAO::countMeetupUser($meetups->getId());
            
            $meetups->attendeeCount=$ac;
         }

    }
}
