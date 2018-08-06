<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = htmlspecialchars($_POST["name"]);
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = htmlspecialchars($_POST["email"]);
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = htmlspecialchars($_POST["message"]);
}


$EmailTo = "Petr-melnik@ukr.net";
$Subject = "New Message Received";//Получено новое сообщение

// prepare email body text  подготовить текст электронного письма электронной почты
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page перенаправить на страницу успеха 
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";//Что-то пошло не так
    } else {
        echo $errorMSG;
    }
}

?>