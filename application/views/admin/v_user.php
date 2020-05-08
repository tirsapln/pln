<!-- /.col-lg-4 -->
<div class="col-lg-12">
        <div class="panel panel-primary">
             <div class="panel-heading">
            <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"> </i> Tambah Data</button>
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
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($user as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_user ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->password ?></td>
                    <td><?= $value->level ?></td>
                    <td>
                    <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"> <i class=" fa fa-pencil"></i> Edit</button>
                    <a href="<?= base_url('user/delete/' .$value->id_user)?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah data ini kan dihapus...?')"> <i class=" fa fa-trash"></i> Hapus</a>


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
                <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
            </div>
            <div class="modal-body">
            
                <?php echo form_open('user/add'); ?>
                <div class="form-group">
                    <label>Nama User</label>
                    <input class="form-control" type="text" name="nama_user" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input class="form-control" type="text" name="level" placeholder="1= Admin, 2=User" required>
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
<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
            </div>
            <div class="modal-body">
            
            <?php echo form_open('user/edit/'.$value->id_user); ?>

                <div class="form-group">
                    <label>Nama User</label>
                    <input class="form-control" value="<?= $value->nama_user ?>" type="text" name="nama_user" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" value="<?= $value->username ?>" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" value="<?= $value->password ?>" type="text" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input class="form-control" value="<?= $value->level ?>" type="text" name="level" placeholder="1= Admin, 2=User" required>
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