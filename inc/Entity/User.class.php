<?php

class User {
  

    private $id;	
	private $email;
	private $password;		
	private $nickname;
	private $phone;
	private $gender;
		

    
    
    public function getPassword()
    {
        return $this->password;
    }

  
    public function setPassword($password)
    {
        $this->password = $password;
    }

    function verifyPassword($password){
        return password_verify($password, $this->password);
    }


    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


	
	
	public function getEmail()
	{
		return $this->email;
	}


	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	
	public function getNickname()
	{
		return $this->nickname;
	}


	public function setNickname($nickname)
	{
		$this->nickname = $nickname;

		return $this;
	}


	public function getPhone()
	{
		return $this->phone;
	}


	public function setPhone($phone)
	{
		$this->phone = $phone;

		return $this;
	}


	public function getGender()
	{
		return $this->gender;
	}

	public function setGender($gender)
	{
		$this->gender = $gender;

		return $this;
	}
}



?>