<div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <?php if($this->session->userdata('level') == "1") { ?>
            <a href="<?= base_url('realisasi/add')?>" class="btn btn-primary btn-sm" > <i class="fa fa-plus"> </i> Tambah Data Realisasi</a>
            <a href="<?= base_url('realisasi/form')?>" class="btn btn-success btn-sm" > <i class="fa fa-table"> </i> Import Excel</a>
            <a href="<?= base_url('realisasi/cetak')?>" class="btn btn-danger btn-sm" > <i class="fa fa-print"> </i> Print</a>
            <a href="<?= base_url('realisasi/pdf')?>" class="btn btn-warning btn-sm" > <i class="fa fa-file"> </i> Export PDF</a>
            
            
            <?php } ?>
            <?php if($this->session->userdata('level') == "2") { ?>
            Tabel Realisasi
            <?php } ?>
        </div>
        <div class="panel-body">
            <?php

            if($this->session->flashdata('pesan'))
                {
                    echo'<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('pesan');
                    echo'</div>';
                }

            ?>

            <?php if($this->session->userdata('level') == "1") { ?>


            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penyulang</th>
                    <th>Titik Koordinat</th>
                    <th>Prioritas</th>
                    <th>Foto</th>
                    <th>Foto Sesudah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($realisasi as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->penyulang ?></td>
                    <td><?= $value->titik_koordinat ?></td>
                    <td><?= $value->prioritas ?></td>
                    <td><img src="<?= base_url('foto_realisasi/'.$value->foto)?>"  width="100px"></td>
                    <td><img src="<?= base_url('foto_realisasi/'.$value->foto_sesudah)?>"  width="100px"></td>
                    <td><?= $value->keterangan ?></td>
                    
                    

                    <td>
                    <a href="<?= base_url('realisasi/edit/' .$value->id_realisasi)?>" class="btn btn-xs btn-success"> <i class=" fa fa-pencil"></i> Edit</a>
                    <?php if($this->session->userdata('level') == "1") { ?>
                    <a href="<?= base_url('realisasi/delete/' .$value->id_realisasi)?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah data ini kan dihapus...?')"> <i class=" fa fa-trash"></i> Hapus</a>
                    <?php } ?>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            <?php } ?>

            <?php if($this->session->userdata('level') == "2") { ?>


<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>No</th>
        <th>Titik Koordinat</th>
        <th>Foto Sebelum</th>
        <th>Foto Sesudah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php $no=1; foreach ($realisasi as $key => $value) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $value->titik_koordinat ?></td>
        <td><img src="<?= base_url('foto_realisasi/'.$value->foto)?>"  width="100px"></td>
        <td><img src="<?= base_url('foto_realisasi/'.$value->foto_sesudah)?>"  width="100px"></td>
        <td><?= $value->keterangan ?></td>
        
        

        <td>
        <a href="<?= base_url('realisasi/edit/' .$value->id_realisasi)?>" class="btn btn-xs btn-success"> <i class=" fa fa-pencil"></i> Edit</a>
        <?php if($this->session->userdata('level') == "1") { ?>
        <a href="<?= base_url('realisasi/delete/' .$value->id_realisasi)?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah data ini kan dihapus...?')"> <i class=" fa fa-trash"></i> Hapus</a>
        <?php } ?>

        </td>
    </tr>
<?php } ?>
</tbody>
</table>
<?php } ?>



            </div>
    </div>
</div>