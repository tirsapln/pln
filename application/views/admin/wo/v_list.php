<div class="col-lg-12">
        <div class="panel panel-primary">
             <div class="panel-heading">
            <a href="<?= base_url('wo/add')?>" class="btn btn-primary btn-sm" > <i class="fa fa-plus"> </i> Tambah Data Pegawai</a>
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
            <?php $no=1; foreach ($wo as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->lokasi ?></td>
                    

                    <td>
                    
                    <a href="<?= base_url('wo/delete/' .$value->id_wo)?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah data ini kan dihapus...?')"> <i class=" fa fa-trash"></i> Hapus</a>


                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            </div>
    </div>
</div>