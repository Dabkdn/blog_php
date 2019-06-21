<?php
session_start();
include_once('config/main.php');
include_once("config/autoload.php");
$cn = isset($_GET["ctl"])? $_GET["ctl"]: "home";
$c = $cn."_controller";
$controller = new $c();
?>
