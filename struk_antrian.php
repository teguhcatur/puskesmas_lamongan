<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            text-align: center;
            padding: 20px;
        }
        .struk {
            display: inline-block;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <?php
    // Ambil data dari URL
    $dokter = isset($_GET['dokter']) ? $_GET['dokter'] : 'Tidak dipilih';
    $ruangan = isset($_GET['ruangan']) ? $_GET['ruangan'] : 'Tidak dipilih';
    ?>

    <div class="struk">
        <h1>Struk Antrian</h1>
        <p><strong>Dokter:</strong> <?= htmlspecialchars($dokter) ?></p>
        <p><strong>Ruangan:</strong> <?= htmlspecialchars($ruangan) ?></p>
    </div>
</body>
</html>
