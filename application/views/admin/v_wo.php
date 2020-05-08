<!-- /.col-lg-4 -->
<div class="col-lg-12">
        <div class="panel panel-primary">
             <div class="panel-heading">
            <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"> </i> Tambah Data Work Order </button>
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
                    <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $value->id_wo ?>"> <i class=" fa fa-pencil"></i> Edit</button>
                    <a href="<?= base_url('won/delete/' .$value->id_wo)?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah data ini kan dihapus...?')"> <i class=" fa fa-trash"></i> Hapus</a>


                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
        
        </div>
    </div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Work Order</h4>
            </div>
            <div class="modal-body">
            
                <?php echo form_open('wo/tambah'); ?>
                <div class="form-group">
                    <label>Tanggal Work Order</label>
                    <select name="id_realisasi" class="form-control">
                    <option value="-">--Pilih Tanggal--</option>
                    <?php foreach($realisasi as $key =>$value) { ?>
                    <option value="<?= $value->id_realisasi ?>"><?= $value->tanggal?></option>
                    <?php } ?>
                    </select>
                </div>



            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal Edit Data -->
<?php foreach ($wo as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_wo ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Work Order</h4>
            </div>
            <div class="modal-body">
            
            <?php echo form_open('wo/edit/' .$value->id_wo); ?>
            <div class="form-group">
                    <label>Tanggal</label>
                    <select name="id_realisasi" class="form-control">
                    <option value="<?= $realisasi->id_realisasi?>"><?= $realisasi->tanggal?></option>
                    <?php foreach($realisasi as $key =>$value) { ?>
                    <option value="<?= $value->id_realisasi ?>"><?= $value->tanggal?></option>
                    <?php } ?>
                    </select>
            </div>



            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>