<?php

function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES); //change to entities line ><>?/
    $text = stripcslashes($text);//to prevent web security,database injection
    return $text;
}

function old($inputName){
    if (isset($_POST[$inputName])){
        echo $_POST[$inputName];
    }else{
        echo "";
    }
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName] = $message;
}

function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}

function clearError(){
    $_SESSION['error'] = [];
}

function register(){

    $errorStatus = 0;
    $name = "";

    if (empty($_POST['name'])){
        setError('name',"Name is required");
        $errorStatus = 1;
    }else{
        if (strlen($_POST['name']) < 5){
            setError('name',"Name is too short");
            $errorStatus = 1;
        }else{
            if (strlen($_POST['name']) > 20){
                setError('name',"Name is too long");
                $errorStatus = 1;
            }else{
                if (!preg_match("/^[a-zA-Z' ]*$/",$_POST['name'])) {
                    setError('name',"Only letters and white space allowed");
                    $errorStatus = 1;
                }else{
                    $name = textFilter($_POST['name']);
                }

            }
        }
    }

    if (empty($_POST['email'])){
        setError('email',"Email is required");
        $errorStatus = 1;
    }else{
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError('email',"Email is required");
            $errorStatus = 1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if (empty($_POST['phone'])){
        setError('phone',"Phone Number is required");
        $errorStatus = 1;
    }else{
        if (!preg_match("/^[0-9]*$/",$_POST['phone'])){
            setError('phone',"Phone is required");
            $errorStatus = 1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    if (!$errorStatus){
        print_r($_POST);
    }
}