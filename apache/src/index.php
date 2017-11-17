<?php 
session_start(); 
include("config.php");
include('navbar.php');
if(!isset($_SESSION['uid'])) {
	include('register.php'); 
} else {

	$uid = $_SESSION['uid']; 
	include('feeds.php');
}
		 
?>