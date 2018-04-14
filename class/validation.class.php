<?php
/*
 ************** this file include for validation *****************
 *           this V.2.1.1 of mazad website at 14 APR 2018        *
 *          this file contains validation functions              *
 *****************************************************************
*/

class validation{
    private $filter = array(
        "boolean"       => FILTER_VALIDATE_BOOLEAN,
        "email"         => FILTER_VALIDATE_EMAIL,
        "float"         => FILTER_VALIDATE_FLOAT,
        "int"           => FILTER_VALIDATE_INT,
        "url"           => FILTER_VALIDATE_URL,
        "regex"         => FILTER_VALIDATE_REGEXP
    );
    
    private $sanitize = array(
        "email"         => FILTER_SANITIZE_EMAIL,
        "encode"        => FILTER_SANITIZE_ENCODED,
        "quote"         => FILTER_SANITIZE_MAGIC_QUOTES,
        "float"         => FILTER_SANITIZE_NUMBER_FLOAT,
        "int"           => FILTER_SANITIZE_NUMBER_INT,
        "rmSpecail"     => FILTER_SANITIZE_SPECIAL_CHARS,
        "string"        => FILTER_SANITIZE_STRING,
        "url"           => FILTER_SANITIZE_URL
    );

    public function isAlpha($string){
        return (ctype_alpha($string));
    }
}//end of validation class

$test = new validation();
if($test->isString("goo1"))
    echo "good";
else
    echo "bad";