<?php
require_once("functions.php");
mkdir("include");
mkdir("include/users");
if (!file_exists('include/users/db.xml')){
    $xml = new DOMDocument("1.0","UTF-8");
    $xml -> loadXML("<users></users>");
    $xml -> save("include/users/db.xml");
}
$errors = array();
if(isset($_POST['login'])){
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['login']);
    $email = htmlspecialchars($_POST['email']);
    $password = createPass(htmlspecialchars($_POST['password']));
    $password2 = createPass(htmlspecialchars($_POST['password2']));
    $name = htmlspecialchars($_POST['name']);
    
    $doc = new DOMDocument();
    $doc->load('include/users/db.xml');
    $users = $doc->getElementsByTagName("user");
    foreach($users as $user){
    $user_get = $user->getElementsByTagName("login");
    $login = $user_get->item(0)->nodeValue;
    if ($login == $username){
        $errors[] = 'Login already exists';
    }
    }
    foreach($users as $row){
    $email_get = $row->getElementsByTagName("email");
    $email_xml = $email_get->item(0)->nodeValue;
    if ($email == $email_xml){
        $errors[] = 'Email already exists';
    }
    }
    if($username == ''){
        $errors[] = 'The login field is blank';
    }
    if($email == ''){
        $errors[] = 'The email field is blank';
    }
    if($name == ''){
        $errors[] = 'The name field is blank';
    }
    if($password == '' || $password2 == ''){
        $errors[] = 'The password field is blank';
    }
    if($password != $password2){
        $errors[] = 'Passwords do not match';
    }
    if(count($errors) == 0){  
            $xml = new DOMDocument("1.0","UTF-8");
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $xml->load("include/users/db.xml");
            $rootTag = $xml->getElementsByTagName('users')->item(0);
            $dataTag = $xml->createElement("user");
            $rootTag->appendChild($dataTag);
    
            $dataTag->appendChild($xml->createElement('login', $username));
            $dataTag->appendChild($xml->createElement('email',$email));
            $dataTag->appendChild($xml->createElement('password', $password));
            $dataTag->appendChild($xml->createElement('name', $name));
    
            $xml->save("include/users/db.xml");
        }
    echo json_encode($errors);
}
?>