<script>
function calculateSubtotal(rowId) {
    // Ambil nilai jumlah dan harga barang
    var jumlah = parseInt(document.getElementById("jumlah_" + rowId).value);
    var harga = parseInt(document.getElementById("harga_" + rowId).value);

    // Hitung subtotal
    var subtotal = jumlah * harga;

    // Tampilkan subtotal
    document.getElementById("subtotal_" + rowId).textContent = subtotal;

    // Hitung grand total
    calculateGrandTotal();
}

function calculateGrandTotal() {
    var grandTotal = 0;

    // Loop melalui setiap subtotal dan tambahkan ke grand total
    <?php foreach ($dataDetail as $dd): ?>
        var subtotal<?= $dd['id'] ?> = parseInt(document.getElementById("subtotal_<?= $dd['id'] ?>").textContent);
        grandTotal += subtotal<?= $dd['id'] ?>;
    <?php endforeach ?>

    // Tampilkan grand total
    document.getElementById("grandTotal").textContent = grandTotal;
}
</script>
