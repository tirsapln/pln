<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p> <h1 style ="text-align : center"> "Data Realisasi" </h1></p>

<table  style ="border : 1px solid " >
<tr>
                    <th style ="border : 1px solid ">No</th>
                    <th style ="border : 1px solid ">Penyulang</th>
                    <th style ="border : 1px solid ">Titik Koordinat</th>
                    <th style ="border : 1px solid ">Prioritas</th>
                    <th style ="border : 1px solid ">Foto</th>
                    <th style ="border : 1px solid ">Foto Sesudah</th>
                    <th style ="border : 1px solid ">Keterangan</th>
</tr>


<?php $no=1; $gambar=""; $gambar1=""; foreach ($realisasi as $key => $value) { 
    
    ?>

<tr>
                    <td  style ="border : 1px solid; text-align : center" width = "50"><?= $no++; ?></td>
                    <td  style ="border : 1px solid; text-align : center" width = "100"><?= $value->penyulang ?></td>
                    <td  style ="border : 1px solid; text-align : center" width = "100"><?= $value->titik_koordinat ?></td>
                    <td  style ="border : 1px solid; text-align : center" width = "100"><?= $value->prioritas ?></td>
                    <?php if($value->foto === "-") { $gambar="-"  ?>
                        <td  style ="border : 1px solid; text-align : center" width = "125"><?= $gambar ?></td>
                    
                    <?php } else { ?>
                        <td  style ="border : 1px solid; text-align : center" width = "125"><img src="<?= base_url('foto_realisasi/'.$value->foto)?>"  width="120px"></td>
                    <?php } ?>

                    <?php if($value->foto_sesudah === "-") { $gambar1 ="-"  ?>
                        <td  style ="border : 1px solid; text-align : center" width = "125"><?= $gambar1 ?></td>
                    
                    <?php } else { ?>
                        <td  style ="border : 1px solid; text-align : center" width = "125"><img src="<?= base_url('foto_realisasi/'.$value->foto_sesudah)?>"  width="120px"></td>
                    <?php } ?>

                    
                    <td  style ="border : 1px solid; text-align : center" width = "100"><?= $value->keterangan ?></td>
</tr>
<?php }?>
</table>



</body>
</html>