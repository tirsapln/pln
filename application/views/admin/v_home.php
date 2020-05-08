<div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            
            
            Daftar Work Order
            
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
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($realisasi as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->lokasi ?></td>
                    <td>
                    <a href="<?= base_url('realisasi/kategori/').$value->tanggal ?>" class="btn btn-primary btn-sm" > <i class="fa fa-search"> </i> Lihat</a>
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
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($realisasi as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->tanggal?></td>
                    <td><?= $value->lokasi ?></td>
                    <td>
                    <a href="<?= base_url('realisasi/kategori/').$value->tanggal ?>" class="btn btn-primary btn-sm" > <i class="fa fa-search"> </i> Lihat</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
<?php } ?>



            </div>
    </div>
</div>