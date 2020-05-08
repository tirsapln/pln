<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
    Edit Work Order
    </div>
        <div class="panel-body">
        
            <?php

            echo validation_errors('div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

            if(isset($error_upload)) {
                echo'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
                            
            }
            echo form_open_multipart('wo/edit/'.$wo->id_wo);
            ?>

            
            <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal</label>
                    <select name="id_realisasi" class="form-control">
                    <option value="<?= $wo->id_realisasi?>"><?= $wo->tanggal?></option>
                    <?php foreach($jabatan as $key =>$value) { ?>
                    <option value="<?= $value->id_realisasi ?>"><?= $value->tanggal?></option>
                    <?php } ?>
                    </select>
            </div>
            </div>
            
            
            
            <div class="form-group">
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-success" >Reset</button>
            </div>
          <?php echo form_close(); ?>  
        </div>
</div>

