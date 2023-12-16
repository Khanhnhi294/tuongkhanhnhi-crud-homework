<?php

function db() {
    $host= "localhost";
    $database= 'web_a';
    $user='root';
    $password ='';

    try{
        $db= new PDO("mysql:host=$host;dbname=$database",$user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
    
function createStudent($value) {
 $name= $value['name'];
 $age= $value['age'];
 $email= $value['email'];
 $img_url= $value['img_url'];
 $stmt= db()->prepare("INSERT INTO `student`(`name`, `age`, `email`, `profile`) VALUES (:name, :age, :email, :profile)");
 var_dump($stmt);
 return $stmt-> execute(['name' => $name, 'age'=> $age, 'email' => $email, 'profile'=> $img_url]) ;
}


function selectAllStudents() {
$stmt= db() -> query(" SELECT *FROM  'student' ; ");
$result= $stmt-> fetchAll(PDO::FETCH_ASSOC);
return $result;

}

function selectOnestudent($id) {
    $stmt = db()->prepare("SELECT * FROM `student` WHERE id = ?");
    if ($stmt) {
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    } else {
        echo "Prepare statement failed";
        exit;
    };
}


function deleteStudent($id) {
    $stmt = db()->prepare("DELETE FROM `student` WHERE id = ?");
    if ($stmt) {
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    } else {
        echo "Prepare statement failed";
        exit;
    }
}


function updateStudent($value_update, $id) {
    $stmt = db()->prepare("UPDATE `student` SET `name` = :name, `age` = :age, `email` = :email, `profile` = :profile WHERE `id` = :id");
    if ($stmt) {
        $stmt->bindParam(':name', $value_update['name']);
        $stmt->bindParam(':age', $value_update['age']);
        $stmt->bindParam(':email', $value_update['email']);
        $stmt->bindParam(':profile', $value_update['img_url']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    } else {
        echo "Prepare statement failed";
        exit;
    }
}
