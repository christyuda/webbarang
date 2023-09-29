<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
      .col-sm-12{
            background: white;
            padding: 20px;
      }
      @media print{
            table{
                  align-content: center;
            }
            .btn{display: none !important;}
            .ds{
                  display: none;
            }
            .cari{
                  display: none !important;
                  box-shadow: none !important;
            }
            hr{
                  display: none;
            }
            .hd{
                  display: none;
            }
      }
</style></head>

<?php 
      $trs = new lsp();
      $dataTransaksi = $trs->select("transaksi_terbaru");
      if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataDetail = $trs->edit("detailTransaksi","kd_transaksi",$id);
            $total  = $trs->selectSumWhere("transaksi","sub_total","kd_transaksi='$id'");
            $jumlah_barang = $trs->selectSumWhere("transaksi","jumlah","kd_transaksi='$id'");
      }
?>
<body>
    <h1>Laporan Transaksi</h1>

    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Nama Penjual</th>
                <th>Jumlah Beli</th>
                <th>Total Harga</th>
                <th>Tanggal Beli</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataTransaksi as $dts): ?>
                <tr>
                    <td><?= $dts['kd_transaksi'] ?></td>
                    <td><?= $dts['nama_user'] ?></td>
                    <td><?= $dts['jumlah_beli'] ?></td>
                    <td><?= "Rp.".number_format($dts['total_harga']).",-" ?></td>
                    <td><?= $dts['tanggal_beli'] ?></td>
                </tr>
            <?php endforeach ?>
            <?php 
                $grandTotal = $trs->selectSum("transaksi", "total_harga");
            ?>
            <tr>
                <td colspan="3"></td>
                <td>Grand Total</td>
                <td><?= "Rp.".number_format($grandTotal['sum']).",-" ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Tambahkan bagian script JavaScript jika diperlukan -->

</body>
</html>
