<?php
session_start();
$_SESSION['USER'] = "-1";

header ("Location:index.php");
?>