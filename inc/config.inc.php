<?php

// set the folder path for the image files
define("IMAGES",'./images/');

//
 define("REPOSITORY",'./data/');
 define("IMAGEREPOSITORY",'./images/');
 define("FILEDATA",'categories.txt');
 define("FILENAME",REPOSITORY.FILEDATA);
 define("PROVINCE",['AB','BC','MB','NB','NL','NT','NS','NU','ON','PE','QC','SK','YT']);


// Set all the database things! double check with the PDOWrapper class and your database 


// Set the error log things!

//Host, user, password, DB
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","project");
define( "DB_PORT",3306);

// definition for log file
define('LOGFILE','');
ini_set("log_errors", TRUE);  
ini_set('error_log', LOGFILE);
