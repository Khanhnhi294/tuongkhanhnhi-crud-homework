<?php
include_once 'database/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['image_url'])) :
   
    $create = createStudent($_POST);
    if($create){
        header("location: index.php");
    }
endif;