<?
include_once("functions.php");
session_start();
deleteRecord();
deleteCookie();
unset($_SESSION['username']);

header('Location: auth.php.');