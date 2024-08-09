<?php
include 'conn.php';

// Query untuk mengambil data dengan limit 5, diurutkan berdasarkan id secara descending
$queryResult = $connect->query("SELECT * FROM dashboard ORDER BY id DESC;");

$result = array();
$seenTimes = array(); // Array untuk melacak waktu yang sudah diproses

if ($queryResult) {
    while ($fetchData = $queryResult->fetch_assoc()) {
        $dateTime = new DateTime($fetchData['time']);
        $formattedTime = $dateTime->format('d');
        $formattedTime1 = $dateTime->format('m');
        $formattedTime2 = $dateTime->format('y');
        
        // Memeriksa apakah waktu sudah pernah diproses
        if (!in_array($formattedTime, $seenTimes)) {
            $seenTimes[] = $formattedTime; // Menambahkan waktu ke array seenTimes

            // Menambahkan data ke hasil akhir
            $result[] = array(
                'suhu' => $fetchData['suhu'],
                'kelembaban' => $fetchData['kelembaban'],
                'time' => $formattedTime,
                'month' => $formattedTime1,
                'year' => $formattedTime2,
            );
            if (count($result) >= 5) {
                break;
            }
        }
    }
    echo json_encode($result);
} else {
    echo json_encode(array('message' => 'Gagal mengeksekusi query.'));
}
?>

