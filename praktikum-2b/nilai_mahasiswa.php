<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : "";
    $mata_kuliah = isset($_POST['mata_kuliah']) ? $_POST['mata_kuliah'] : "";
    $nilai_uts = isset($_POST['nilai_uts']) ? $_POST['nilai_uts'] : 0;
    $nilai_uas = isset($_POST['nilai_uas']) ? $_POST['nilai_uas'] : 0;
    $nilai_tugas = isset($_POST['nilai_tugas']) ? $_POST['nilai_tugas'] : 0;

// SISWA DINYATAKAN LULUS JIKA NILAI TOTAL dengan presentase 30% UTS, 35% UAS dan TUGAS 35% melebihi 55
$nilai_total = ($nilai_uts * 0.30) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

// MENENTUKAN LULUS ATAU TIDAK MENGGUNAKAN IF ELSE
if ($nilai_total > 55) {
    $status = "Lulus";
} else {
    $status = "Tidak Lulus";
}

// MENENTUKAN GRADE NILAI MENGGUNAKAN SYNTAX IF ELSE MULTIKONDISI
if ($nilai_total >= 85-100) {
    $grade = "A";
} elseif ($nilai_total >= 70-84) {
    $grade = "B";
} elseif ($nilai_total >= 56-69) {
    $grade = "C";
} elseif ($nilai_total >= 36-55) {
    $grade = "D";
} elseif ($nilai_total >= 0-35) {
    $grade = "E";
} else {
    $grade = "I";
}
/*
- Grade E : Jika Nilai Akhir 0-35
- Grade D : Jika Nilai Akhir 36-55
- Grade C : Jika Nilai Akhir 56-69
- Grade B : Jika Nilai Akhir 70-84
- Grade A : Jika Nilai Akhir 85-100
- Grade I : Jika Nilai Akhir < 0 atau Nilai Akhir > 100
*/

// MENENTUKAN PREDIKAT NILAI MENGGUNAKAN SYNTAX SWITCH
switch ($grade) {
    case "A":
        $predikat = "Sangat Memuaskan";
        break;
    case "B":
        $predikat = "Memuaskan";
        break;
    case "C":
        $predikat = "Cukup";
        break;
    case "D":
        $predikat = "Kurang";
        break;
    case "E":
        $predikat = "Sangat Kurang";
        break;
    default:
        $predikat = "Tidak Ada";
}
/*
- Predikat Sangat Kurang : Jika Grade E
- Predikat Kurang : Jika Grade D
- Predikat Cukup : Jika Grade C
- Predikat Memuaskan : Jika Grade B
- Predikat Sangat Memuaskan : Jika Grade A
- Predikat Tidak Ada : Jika Grade I
*/

// MENCETAK HASIL
echo "<h2>Hasil Penilaian</h2>";
echo "Nama: $nama <br>";
echo "Mata Kuliah: $mata_kuliah <br>";
echo "Nilai UTS: $nilai_uts <br>";
echo "Nilai UAS: $nilai_uas <br>";
echo "Nilai Tugas: $nilai_tugas <br>";
echo "Nilai Total: $nilai_total <br>";
echo "Status: $status <br>";
echo "Grade: $grade <br>";
echo "Predikat: $predikat <br>";
}