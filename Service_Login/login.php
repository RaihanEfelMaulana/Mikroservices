<?php
include 'conn.php';

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $queryResult=$connect->query("SELECT*from login WHERE email='".$email."'and password='".$password."'");
    
    $result=array();
    
    while($fetchData=$queryResult->fetch_assoc()){
        $result[]=$fetchData;
    }
     echo json_encode($result);
}else{
    echo json_encode(array('message'=>'Kunci email atau password tidak ditemukan dalam permintaan POST.'));
}

?>
