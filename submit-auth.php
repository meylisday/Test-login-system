<?php
require_once("functions.php");
if (!file_exists('include/users/session.xml')){
    $xml = new DOMDocument("1.0","UTF-8");
    $xml -> loadXML("<users></users>");
    $xml -> save("include/users/session.xml");
}
$errors = array();
if(isset($_POST['auth_login'])){
    $auth_login = preg_replace('/[^A-Za-z]/', '', $_POST['auth_login']);
    $auth_password = createPass(htmlspecialchars($_POST['auth_password']));
    $xml = new DOMDocument();
    $xml->load('include/users/db.xml');
    $users = $xml->getElementsByTagName("user");
    foreach ($users as $row){
    $user_auth = $row->getElementsByTagName("login");
    $login = $user_auth ->item(0)->nodeValue;
    $auth_pass = $row->getElementsByTagName("password");
    $pass = $auth_pass->item(0)->nodeValue;
        if ($login != $auth_login && $pass != $auth_password){
            $errors[] = 'Users not found';
        }
    }
    if ($auth_login == ''){
        $errors[] = 'The login field is blank';
    }
    if ($auth_password == ''){
        $errors[] = 'The password field is blank';
    }
    if (count($errors) == 0){
        setcookie('login', $auth_login, time() + (60*60*24*7));
        setcookie('password', $_POST['auth_password'], time() + (60*60*24*7));
        session_start();
        $_SESSION['username'] = $auth_login;
        $date = date('d-m-Y H:i:s');
        $docxx = new DOMDocument();
        $docxx->preserveWhiteSpace = false;
        $docxx->formatOutput = true;
        $docxx->load('include/users/session.xml');
        $rootTag = $docxx->getElementsByTagName('users')->item(0);
        $dataTag = $docxx->createElement("user");
        $rootTag->appendChild($dataTag);
        $dataTag->appendChild($docxx->createElement('login', $auth_login));
        $dataTag->appendChild($docxx->createElement('password', $auth_password));
        $dataTag->appendChild($docxx->createElement('date', $date));
        $docxx->save("include/users/session.xml");

        $doc = new DOMDocument();
        $doc->load('include/users/session.xml');
        $get_users = $doc->getElementsByTagName("user");
        foreach ($get_users as $row){
        $get_user = $row->getElementsByTagName("login");
        $get_login =  $get_user ->item(0)->nodeValue;
        if ($get_login == $auth_login){
            $docx = new DOMDocument;
            $docx->load("include/users/session.xml");
            $get_us = $docx->getElementsByTagName('user');
            foreach ($get_us as $row){
                $user_auth = $row->getElementsByTagName("login");
                $login = $user_auth ->item(0)->nodeValue;
                if ($login == $auth_login){
                $date_auth = $row->getElementsByTagName("date");
                $get_date =  $date_auth ->item(0)->nodeValue = $date;
                $docx ->save("include/users/session.xml");
            }
        }
    }  
}

        }
    echo json_encode($errors);
}
?>