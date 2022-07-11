<?php

class Meetup {
  

    
	private $id;
	private $title;
	private $category;
	private $province;		
	private $city;
	private $address;	
	private $mTime;
	private $mDay;
	private $userId;

    
    
    


	public function getId()
	{
		return $this->id;
	}

	
	public function setId($id)
	{
		$this->id = $id;

		
	}

	
	public function getTitle()
	{
		return $this->title;
	}


	public function setTitle($title)
	{
		$this->title = $title;

		
	}

	
	public function getProvince()
	{
		return $this->province;
	}

	
	public function setProvince($province)
	{
		$this->province = $province;

		
	}


	public function getCity()
	{
		return $this->city;
	}

	public function setCity($city)
	{
		$this->city = $city;

		
	}

	
	public function getAddress()
	{
		return $this->address;
	}


	public function setAddress($address)
	{
		$this->address = $address;

		
	}

	
	public function getMTime()
	{
		return $this->mTime;
	}

	
	public function setMTime($mTime)
	{
		$this->mTime = $mTime;

		
	}

	
	public function getMDay()
	{
		return $this->mDay;
	}

	
	public function setMDay($mDay)
	{
		$this->mDay = $mDay;

		
	}

	
	public function getUserId()
	{
		return $this->userId;
	}

	
	public function setUserId($userId)
	{
		$this->userId = $userId;

		
	}

	
	public function getCategory()
	{
		return $this->category;
	}

	
	public function setCategory($category)
	{
		$this->category = $category;

	}
}



?>