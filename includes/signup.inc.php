<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//grabbing the data
	$uid = htmlspecialchars($_POST['uid']);
	$pwd = htmlspecialchars($_POST['pwd']);
	$pwdRepeat = htmlspecialchars($_POST['pwdRepeat']);
	$email = htmlspecialchars($_POST['email']);

	//instantaite signupContr class
	include "../classes/dbh.classes.php";
	include "../classes/signup.classes.php";
	include "../classes/signup-contr.classes.php";

	$signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

	//Running error handlers and user signup
	$signup->signupUser();

	$userId = $signup->fetchuserId($uid);
	//instantaite ProfileInfoContr class
	include "../classes/profileinfo.classes.php";
	include "../classes/profileinfo-contr.classes.php";
	$profileInfo = new ProfileInfoContr($userId, $uid);
	$profileInfo->defaultProfileInfo();

	//going to back to front page
	header("location: ../index.php?error=none");

}