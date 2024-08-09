<?php
include 'conn.php'; 

if(isset($_POST['command'])){
    $status = $_POST['command'];

    if($status == '1'){
        $sql = "UPDATE relay SET status = 1 where id = 1";
        echo"aktif";
    } else if($status == '0'){
        $sql = "UPDATE relay SET status = 0 where id = 1";
        echo"mati";
    } else {
        echo "Command tidak valid";
        exit;
    }

    if ($connect->query($sql) === TRUE) {
        echo "Status relay berhasil diperbarui";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo "tidak ada data";
}

$connect->close();
?>
