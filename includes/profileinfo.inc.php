<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$id = $_SESSION['userid'];
	$uid = $_SESSION['useruid'];
	$about = htmlspecialchars($_POST['about']);
	$introTitle = htmlspecialchars($_POST['introtitle']);
	$introText = htmlspecialchars($_POST['introtext']);

	include "../classes/dbh.classes.php";
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";

   $profileInfo = new ProfileInfoContr($id, $uid);

   $profileInfo->updateProfileInfo($about, $introTitle, $introText);

   header("location: ../profile.php?error=none");
}