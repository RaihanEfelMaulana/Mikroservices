<?php
include 'conn.php'; 

if(isset($_POST['payload'])) {

    $query = "UPDATE relay SET status = 0 where id = 1";
    if ($connect->query($query) === TRUE) {
        echo "Data status relay telah diupdate";
    } else {
        echo "Gagal update status relay " . $connect->error;
    }
} else {
    // Jika data kelembaban tidak diterima
    echo "tidak ada post";
}

$connect->close();
?>
