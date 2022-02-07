<?php 

session_destroy();
session_start();
session_regenerate_id();
// redirection
header("location:index.php?page=login");

?>