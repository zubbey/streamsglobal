<?php
ini-set( 'display_errors', 1 );
error_reporting( E_ALL );

$from = "help@streamsglobal.com";
$to = "com.zubbey@hotmail.com";

$subject = "test from a live server";
$message = "hello am a bot send from a live server";
$headers = "From:" . $from;

mail($to, $subject, $message, $headers);

if(mail){

echo" sent succesfully! ";

}else {
echo" could not send mail";
}
