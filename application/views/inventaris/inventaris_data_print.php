<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan</title>
  <!-- <link href="<?= base_url() ?>/assets/frontend/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }

    .tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}

  </style>
</head>
<body>
  <img src="<?php echo 'assets/logo-gki.png'; ?>" style="position: absolute; width: 140px; height: auto;">
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          <b>GEREJA KRISTEN INJILI DI TANAH PAPUA</b>
          <br>(Anggota Persekutuan Gereja-gereja di Indonesia)
          <br><b>KLASIS PORT NUMBAY</b>
          <br><b>JEMAAT HARAPAN ABEPURA</b>
          <br>Jalan Serui No. 38, Kota Baru, Abepura-Jayapura
        </span>
      </td>
    </tr> 


  </table>

  <hr class="line-title"> 
  <p align="center">
    DATA INVENTARIS<br>
  </p>
  <table class="tg">
<thead>
  <tr>
    <th class="tg-0pky">Nama Barang</th>
    <th class="tg-0pky">Jenis Barang</th>
    <th class="tg-0pky">Bahan Baku</th>
    <th class="tg-0pky">Ukuran</th>
    <th class="tg-0pky">Tahun Pembelian</th>
    <th class="tg-0pky">Harga Beli</th>
    <th class="tg-0pky">Jumlah Barang</th>
    <th class="tg-0pky">Keadaan Barang</th>
    <th class="tg-0pky">Ruangan</th>
  </tr>
</thead>
<tbody>
<?php  foreach ($row->result() as $key => $data) { ?>
  <tr>
    <td class="tg-0lax"><?=$data->inventaris_nama?></td>
    <td class="tg-0lax"><?=$data->jenisbarang_nama?></td>
    <td class="tg-0lax"><?=$data->bahan_nama?></td>
    <td class="tg-0lax"><?=$data->inventaris_ukuran?></td>
    <td class="tg-0lax"><?=$data->inventaris_tahunbeli?></td>
    <td class="tg-0lax"><?=$data->inventaris_harga?></td>
    <td class="tg-0lax"><?=$data->inventaris_jumlah?></td>
    <td class="tg-0lax"><?=$data->inventaris_keadaan?></td>
    <td class="tg-0lax"><?=$data->ruangan_nama?></td>
  </tr>
  <?php }?>
</tbody>
</table>
<!-- <script src="<?= base_url() ?>/assets/frontend/dist/js/bootstrap.min.js"></script> -->

</body>
</html>