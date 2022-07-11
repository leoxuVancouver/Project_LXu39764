<?php

class Meetup_users {
  


    private $userId;
	private $meetupId;

   
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        
    }

	public function getMeetupId()
	{
		return $this->meetupId;
	}

	public function setMeetupId($meetupId)
	{
		$this->meetupId = $meetupId;
	
	}
}



?>