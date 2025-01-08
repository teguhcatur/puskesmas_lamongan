<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Dokter dan Ruangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font-size: 1.8em;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            font-size: 1em;
        }

        select:focus {
            border-color: #007bff;
            outline: none;
            background: #eef6ff;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:active {
            background-color: #003f7f;
        }

        button:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }

        .info {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Pilih Dokter dan Ruangan</h1>

        <div class="form-group">
            <label for="dokter">Pilih Dokter:</label>
            <select id="dokter">
                <option value="">-- Pilih Dokter --</option>
                <option>Dr. Terawan Agus Putranto</option>
                <option>Dr. Loekman Soetrisno</option>
                <option>Dr. Fery Fahrizal Noor</option>
                <option>Dr. Ari Fahrial Syam</option>
                <option>Dr. Andri SpKJ</option>
                <option>Dr. Boy Abidin</option>
                <option>Dr. Reisa Broto Asmoro</option>
                <option>Dr. Adib Khumaidi</option>
                <option>Dr. Eka Julianta Wahjoepramono</option>
                <option>Dr. Putu Ayu Bulantrisna Djelantik</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ruangan">Pilih Ruangan:</label>
            <select id="ruangan">
                <option value="">-- Pilih Ruangan --</option>
                <option>Ruangan IGD (Instalasi Gawat Darurat)</option>
                <option>Ruangan ICU (Intensive Care Unit)</option>
                <option>Ruangan Operasi</option>
                <option>Ruangan Perawatan Anak</option>
                <option>Ruangan Perawatan Umum</option>
                <option>Ruangan Bersalin</option>
                <option>Ruangan Radiologi</option>
                <option>Ruangan Laboratorium</option>
                <option>Ruangan Fisioterapi</option>
                <option>Ruangan Kesehatan Gigi</option>
                <option>Ruangan Pelayanan Jiwa</option>
                <option>Pelayanan Surat Dokter</option>
            </select>
        </div>

        <button id="submitBtn" onclick="generatePDF()">Submit</button>
        <div class="info">Harap pilih dokter dan ruangan sebelum mengirim.</div>
    </div>

    <script>
        function generatePDF() {
            const dokter = document.getElementById('dokter').value;
            const ruangan = document.getElementById('ruangan').value;

            if (!dokter || !ruangan) {
                alert('Harap pilih dokter dan ruangan terlebih dahulu.');
                return;
            }

            // Kirim data ke server untuk menghasilkan PDF
            const url = `generate_pdf.php?dokter=${encodeURIComponent(dokter)}&ruangan=${encodeURIComponent(ruangan)}`;
            window.open(url, '_blank'); // Buka PDF di tab baru
        }
    </script>
</body>
</html>
