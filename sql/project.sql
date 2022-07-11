drop database if exists Project;
create database Project;
use Project;

create table Users (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
	password VARCHAR(250),			
	nickname VARCHAR(50),
	phone VARCHAR(15),	
	gender VARCHAR(10)
) Engine=InnoDB;



create table Meetups (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	title VARCHAR(250),
	category VARCHAR(250),
	province VARCHAR(250),		
	city VARCHAR(250),
	address VARCHAR(250),	
	mTime TIME,
	mDay DATE,
	userId INT NOT NULL,
	
	FOREIGN KEY (userId)
        REFERENCES Users (id)
        ON DELETE CASCADE
		
) Engine=InnoDB;


create table meetup_users (	
	userId INT NOT NULL,
	meetupId INT NOT NULL,
	PRIMARY KEY(userId,meetupId),
	FOREIGN KEY(userId) REFERENCES Users(id) ON DELETE CASCADE,
	FOREIGN KEY(meetupId) REFERENCES Meetups(id) ON DELETE CASCADE
) Engine=InnoDB;


-- insert into Meetups (id,email,password,nickname,phone,gender) 
-- 			values ('1',"leoguotengxu@gmail.com",'1234567','Leo','male');


insert into Meetups (title,category,province,city,address,mTime,mDay,userId) 
			values ('leomeet',"hiking",'BC','Burnaby','5452 clinton st','11:30:45','2022-7-10',1);

-- insert into Meetup_users (meetupId,userId) values (1,1);

-- insert into Meetup_users (meetupId,userId) values (1,2);









