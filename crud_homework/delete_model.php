<?php
 include_once 'database/database.php';
 if (deleteStudent($_GET['id'])){
     header("location: index.php");
 }
?>