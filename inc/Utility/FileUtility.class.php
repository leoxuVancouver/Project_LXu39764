<?php

class FileUtility {

    static $error ='';
    

    static function read()    {

        try {
            // the following will produce an html warning if the file does not exist!
            $fh = fopen(FILENAME,'r');
            if (!$fh)    {
                throw new Exception("Couldn't open file $fh");
            }
            $contents = fread($fh,filesize(FILENAME));
            fclose($fh);
         
        } catch (Exception $fe)  {
            Page::$notifications[] = $fe->getMessage(); 
        }
       
        return $contents;
    }

    static function write()    {

        try {
            // the following will produce an html warning if the file does not exist!
            $fh = fopen(FILENAME,'a');
            // construct the entry
            $cate = $_POST['category'];
            $desc = $_POST['desc'];
            $str = "\n". $cate . ", " . $desc;
            // lock the file
            flock($fh, LOCK_EX);

            // we will wait to write it
            fwrite($fh, $str, strlen($str));
            flock($fh, LOCK_UN);

            fclose($fh);

            
        } catch (Exception $fe)  {
            Page::$notifications[] = array($fe->getMessage());                        
        }
        
        
    }

    static function uploadCatData(){
        //A simple check if a file was uploaded
        
        if (empty($_FILES['cateData']['name'])) {
            Page::$notifications[] = "Error: Please select a file to upload.";       
        }
        else{
            
            if (is_uploaded_file($_FILES['cateData']['tmp_name'])) {
                // We skip the file format checking              
                
                $result = move_uploaded_file($_FILES['cateData']['tmp_name'],FILENAME);
                if ($result == 1){ 
                    Page::$notifications[] = "Success: File was successfully uploaded.";                    
                }
                else 
                    Page::$notifications[] = "Error: There was a problem uploading the file.";
            }
        }
    }

    static function uploadImage(){
        //A simple check if a file was uploaded
        
        if (empty($_FILES['imagefile']['name'])) {
            self::$error = "Error: Please select a image to upload.";       
        }
        else{
            
            if (is_uploaded_file($_FILES['imagefile']['tmp_name'])) {
                // We skip the file format checking              
                $imageUrl=IMAGEREPOSITORY.$_FILES['imagefile']['name'];
                $result = move_uploaded_file($_FILES['imagefile']['tmp_name'],$imageUrl);
                if ($result != 1)
                     self::$error = "Error: There was a problem uploading the file.";
            }
        }
        return self::$error;
    }

    
}

?>