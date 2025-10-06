<?php
session_start();

function __autoload($className){
	require_once __DIR__ . "/../classes/" . $className . ".php";
}

header("Content-type: text/html; charset=UTF-8");