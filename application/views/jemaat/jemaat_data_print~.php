<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3> Laporan PDF Toko Kita</h3>
        </div>
        <table id="table">
            <thead>
            <tr>
            <th>#</th>
            <th>NIK Jemaat</th>
            <th>Nama Jemaat </th>
            <th>Jenis Kelamin</th> 
            <th>Alamat</th> 
            <th>Tempat dan Tanggal Lahir</th>
            <th>Unsur</th>
            <th>KSP</th>
            <th>Wijk</th>
            <th>Status Baptis</th>
            <th>Status Sidi</th>
            <th>Status Nikah</th>
            </tr>
        </thead>
    <tbody>
        <?php $no = 1;
        foreach ($row->result() as $key => $data) { ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data->jemaat_nik?></td>
            <td><?=$data->jemaat_nama?></td>
            <td><?=$data->jemaat_jenis_kelamin?></td>
            <td><?=$data->jemaat_alamat?></td>
            <td><?=$data->jemaat_tempat_lahir?>, <?=$data->jemaat_tanggal_lahir?></td>
            <td><?=$data->unsur_kode?></td>
            <td><?=$data->ksp_nama?></td>
            <td><?=$data->wijk_nama?></td>
            <td><?=$data->jemaat_baptis?></td>
            <td><?=$data->jemaat_sidi?></td>
            <td><?=$data->jemaat_nikah?></td>
        </tr>
        <?php
        } ?>
    </tbody>
</table>
    </body>
</html>