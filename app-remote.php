<?php
include_once "app-remote.conf.php";

if ($password == $_GET["pw"])
{
	echo exec("sudo ./send ".$_GET["code"]." ".$_GET["model"]." ".$_GET["status"]);
} else {
	echo "pw";
}
?>