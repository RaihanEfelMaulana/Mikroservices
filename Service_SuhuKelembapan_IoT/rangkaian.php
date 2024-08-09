<?php
include 'conn.php'; // Menghubungkan ke database

// Memeriksa apakah data kelembaban diterima
if(isset($_POST['nilai_kelembaban']) || isset($_POST['nilai_suhu'])) {
    // Menerima data dari sensor
    $nilai_kelembaban = $_POST['nilai_kelembaban']; // Misalnya data kelembaban dari sensor
    $nilai_suhu = $_POST['nilai_suhu'];

    // Menyimpan data ke dalam database
    $query = "INSERT INTO dashboard (kelembaban,suhu) VALUES ('$nilai_kelembaban','$nilai_suhu')";
    if ($connect->query($query) === TRUE) {
        echo "Data kelembaban tanah dan suhu berhasil disimpan";
    } else {
        echo "Gagal menyimpan data kelembaban tanah dan suhu: " . $connect->error;
    }
} else {
    // Jika data kelembaban tidak diterima
    echo "Data kelembaban tanah dan suhu tidak diterima";
}

$connect->close();
?>
