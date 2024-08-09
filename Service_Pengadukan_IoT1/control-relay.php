<?php
include 'conn.php';

try {
    $queryResult = $connect->query("SELECT status FROM relay where id = 1");

    if ($queryResult === false) {
        throw new Exception('Gagal mengeksekusi query.');
    }

    if ($queryResult->num_rows > 0) {
        $fetchData = $queryResult->fetch_assoc();
        $status = intval($fetchData['status']); // Mengubah string menjadi integer
        echo json_encode($status);
    } else {
        echo json_encode(array('message' => 'Tidak ada data.'));
    }
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}
?>