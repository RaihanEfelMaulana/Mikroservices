<?php
include 'conn.php';

$queryResult = $connect->query("SELECT * FROM dashboard ORDER BY id DESC LIMIT 1");

$result = array();

if ($queryResult) {
    while ($fetchData = $queryResult->fetch_assoc()) {
        $result['suhu'] = $fetchData['suhu'];
        $result['kelembaban'] = $fetchData['kelembaban'];
    }
    echo json_encode($result);
} else {
    echo json_encode(array('message' => 'Gagal mengeksekusi query.'));
}
?>
