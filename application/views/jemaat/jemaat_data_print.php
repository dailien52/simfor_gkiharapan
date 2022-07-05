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
  <img src="assets/logo-gki.png" style="position: absolute; width: 140px; height: auto;">
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
    DATA JEMAAT <br>
  </p>
  <table class="tg">
<thead>
  <tr>
    <th class="tg-0pky">NIK</th>
    <th class="tg-0pky">Nama Lengkap</th>
    <th class="tg-0pky">Jenis Kelamin</th>
    <th class="tg-0pky">Alamat</th>
    <th class="tg-0pky">Tempat dan Tanggal Lahir</th>
    <th class="tg-0pky">Unsur</th>
    <th class="tg-0pky">KSP</th>
    <th class="tg-0pky">Wijk</th>
    <th class="tg-0pky">Status Baptis</th>
    <th class="tg-0pky">Status Sidi</th>
    <th class="tg-0pky">Status Nikah</th>
  </tr>
</thead>
<tbody>
<?php  foreach ($row->result() as $key => $data) { ?>
  <tr>
    <td class="tg-0lax"><?=$data->jemaat_nik?></td>
    <td class="tg-0lax"><?=$data->jemaat_nama?></td>
    <td class="tg-0lax"><?=$data->jemaat_jenis_kelamin?></td>
    <td class="tg-0lax"><?=$data->jemaat_alamat?></td>
    <td class="tg-0lax"><?=$data->jemaat_tempat_lahir?>, <?=$data->jemaat_tanggal_lahir?></td>
    <td class="tg-0lax"><?=$data->unsur_nama?></td>
    <td class="tg-0lax"><?=$data->ksp_nama?></td>
    <td class="tg-0lax"><?=$data->wijk_nama?></td>
    <td class="tg-0lax"><?=$data->jemaat_baptis?></td>
    <td class="tg-0lax"><?=$data->jemaat_sidi?></td>
    <td class="tg-0lax"><?=$data->jemaat_nikah?></td>
  </tr>
  <?php }?>
</tbody>
</table>
<!-- <script src="<?= base_url() ?>/assets/frontend/dist/js/bootstrap.min.js"></script> -->

</body>
</html>