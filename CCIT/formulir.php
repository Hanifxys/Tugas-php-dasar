<?php
function getPostValue($key) {
    return isset($_POST[$key]) ? $_POST[$key] : null;
}

// Penjumlahan disini
$angka1 = getPostValue('angka1');
$angka2 = getPostValue('angka2');
$resultAddition = null;

if (isset($_POST['submit_add'])) {
    if (!empty($angka1) && !empty($angka2)) {
        $resultAddition = $angka1 + $angka2;
    } else {
        $resultAddition = "Isi kedua angka untuk melakukan penjumlahan.";
    }
}

// Formulir disini
$nama = getPostValue('nama');
$nim = getPostValue('nim');
$nilai = getPostValue('nilai');
$absen = getPostValue('absen');
$resultValue = null;

if (isset($_POST['submit_value'])) {
    if (!empty($nilai) && !empty($absen)) {
        $rataRata = ($nilai + $absen) / 2;

        $resultValue = [
            'nama' => $nama,
            'nim' => $nim,
            'rata_rata' => $rataRata,
            'hasil' => $rataRata >= 75 ? 'Lulus' : 'Gagal'
        ];
    } else {
        $resultValue = "Silakan isi nilai dan absen untuk menghitung rata-rata.";
    }
}

// Operasi Matematika
$angka1_math = getPostValue('angka1_math');
$angka2_math = getPostValue('angka2_math');
$resultMath = null;
$operation = getPostValue('operasi_math') ?? 'tambah';

if (isset($_POST['submit_math'])) {
    if ($operation === 'tambah') {
        $resultMath = $angka1_math + $angka2_math;
    } elseif ($operation === 'kurang') {
        $resultMath = $angka1_math - $angka2_math;
    } elseif ($operation === 'kali') {
        $resultMath = $angka1_math * $angka2_math;
    } elseif ($operation === 'bagi') {
        $resultMath = $angka2_math != 0 ? $angka1_math / $angka2_math : 'Tidak dapat dibagi oleh nol';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combined Form</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            max-width: 400px;
            background-color: #f8f8f8;
            color: #333;
            text-align: center;
        }

        form {
            margin-top: 15px;
        }

        button {
            background-color: #000;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        select, input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Penjumlahan Angka</h1>
        
        <form action="" method="POST">
            <input type="number" id="angka1" name="angka1" placeholder="Angka 1" value="<?= $angka1 ?>" required><br>
            <input type="number" id="angka2" name="angka2" placeholder="Angka 2" value="<?= $angka2 ?>" required><br>
            <button type="submit" name="submit_add">Hitung</button><br>
        </form>

        <?php if (isset($_POST['submit_add'])): ?>
            <?php if (!empty($resultAddition)): ?>
                <p>Hasil penjumlahan: <?= $resultAddition ?></p>
            <?php else: ?>
                <p>Silakan isi kedua angka untuk melakukan penjumlahan.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- pemisahnya -->
    <hr>

    <div class="container">
        <h1>Formulir Nilai</h1>

        <form action="" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= $nama ?>" required><br>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?= $nim ?>" required><br>

            <label for="nilai">Nilai:</label>
            <input type="number" id="nilai" name="nilai" value="<?= $nilai ?>" required><br>

            <label for="absen">Absen:</label>
            <input type="number" id="absen" name="absen" value="<?= $absen ?>" required><br>

            <button type="submit" name="submit_value">Hitung</button><br>
        </form>

        <?php if (isset($_POST['submit_value'])): ?>
            <?php if (!empty($resultValue)): ?>
                <h2>Hasil Nilai</h2>
                <p>Nama: <?= $resultValue['nama'] ?></p>
                <p>NIM: <?= $resultValue['nim'] ?></p>
                <p>Rata-rata Nilai: <?= $resultValue['rata_rata'] ?></p>
                <p>Hasil: <?= $resultValue['hasil'] ?></p>
            <?php else: ?>
                <p>Silakan isi nilai dan absen untuk menghitung rata-rata.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

     <!-- pemisahnya -->
    <hr>

    <div class="container">
        <h1>Select Operasi Matematika</h1>
        
        <form action="" method="POST">
            <input type="number" id="angka1_math" name="angka1_math" placeholder="Angka 1" value="<?= $angka1_math ?>" required><br>
            <input type="number" id="angka2_math" name="angka2_math" placeholder="Angka 2" value="<?= $angka2_math ?>" required><br>

            <label for="operasi_math">Pilih Operasi:</label>
            <select id="operasi_math" name="operasi_math">
                <?php
                $operations_math = ['tambah', 'kurang', 'kali', 'bagi'];
                foreach ($operations_math as $op_math) {
                    $selected_math = ($operation === $op_math) ? 'selected' : '';
                    echo "<option value=\"$op_math\" $selected_math>$op_math</option>";
                }
                ?>
            </select><br>

            <button type="submit" name="submit_math">Hitung</button><br>
        </form>

        <?php if (isset($_POST['submit_math'])): ?>
            <?php if (!empty($resultMath)): ?>
                <p>Hasil operasinya adalah: <?= $resultMath ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</body>
</html>
