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
