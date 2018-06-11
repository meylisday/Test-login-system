<?php 
function createString($len)
{
    $string = "35XRBVdevW7n2ZqbJmd7cqz2iXnYb39h";	
    return $string;
}
function createPass($mypass){
    $salt = createString(32);
    $value = md5($mypass.$salt);
    return $value;
}
function deleteCookie(){
    if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
        $login = $_COOKIE['login'];
        $password = $_COOKIE['password'];
        setcookie('login',  "", time() - 3600);
        setcookie('password',  "", time() - 3600);
    }
}
function deleteRecord(){
return unlink('include/users/session.xml');;
}

?>