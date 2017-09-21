<?php
$base = 'airazur'; 
$hote = 'localhost'; 
$user = 'root'; 
$mdp = '';

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $user, $mdp);
	$bdd->exec('SET NAMES utf16');
