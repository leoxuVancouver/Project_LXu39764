<?php

class DataParse
{
    static $contents=[];
   
    static function strToArray($content)
    {
       $lines=explode("\n",$content);
       foreach($lines as $line){
            $item=explode(",",$line);
            self::$contents[]=$item[0];
       }
      return self::$contents;

    }
}
