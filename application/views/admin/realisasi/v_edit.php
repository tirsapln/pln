<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
    Edit Data Realisasi
    </div>
        <div class="panel-body">

            <?php

            echo validation_errors('div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

            if(isset($error_upload)) {
                echo'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
                            
            }

            echo form_open_multipart('realisasi/edit/'.$realisasi->id_realisasi);
            ?>

                <?php if($this->session->userdata('level') == "1") { ?>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Penyulang</label>
                    <input class="form-control" type="text" name="penyulang" value="<?= $realisasi->penyulang?>" placeholder="Penyulang" required>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" value="<?= $realisasi->tanggal?>" placeholder="Tanggal">
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
                    <label>Titik Koordinat</label>
                    <input class="form-control" type="text" name="titik_koordinat" value="<?= $realisasi->titik_koordinat?>" placeholder="Titik Koordinat">
            </div>
            </div>
            
            <div class="col-md-6">
            <div class="form-group">
                    <label>Lokasi</label>
                    <input class="form-control" type="text" name="lokasi" value="<?= $realisasi->lokasi?>" placeholder="Lokasi" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Nama Pohon</label>
                    <input class="form-control" type="text" name="nama_pohon" value="<?= $realisasi->nama_pohon?>" placeholder="Nama Pohon" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>No Tiang</label>
                    <input class="form-control" type="text" name="no_tiang" value="<?= $realisasi->no_tiang?>" placeholder="No Tiang" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Prioritas</label>
                    <input class="form-control" type="text" name="prioritas" value="<?= $realisasi->prioritas?>" placeholder="Prioritas">
            </div>
            </div>

            <div class="form-group">
                    
                <img  src="<?= base_url('foto_realisasi/'.$realisasi->foto) ?>" width="150px">
                    
            </div>

            
            <div class="col-md-6">
            <div class="form-group">
                    <label>Foto Sebelum</label>
                    <input type="file" class="form-control" name="foto" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Temuan</label>
                    <input class="form-control" type="text" name="temuan" value="<?= $realisasi->temuan?>" placeholder="Temuan">
            </div>
            </div>

            <div class="form-group">
                    
                <img  src="<?= base_url('foto_realisasi/'.$realisasi->foto_sesudah) ?>" width="150px">
                    
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Foto Sesudah</label>
                    <input type="file" class="form-control" name="foto_sesudah" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label>Keterangan</label>
                    <select name="keterangan" class="form-control">
                    <option value="<?= $realisasi->keterangan?>"><?= $realisasi->keterangan?></option>
                    <option value="Pangkas">Pangkas</option>
                    <option value="Tebang">Tebang</option>
                    <option value="Perlu Padam">Perlu Padam</option>
                    </select>
            </div>
            </div>

            <div class="form-group">
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-success" >Reset</button>
            </div>

            <?php } ?> 

            <?php if($this->session->userdata('level') == "2") { ?>

<div class="col-md-6">
<div class="form-group">
        <label>Penyulang</label>
        <input class="form-control" type="text" name="penyulang" value="<?= $realisasi->penyulang?>" placeholder="Penyulang" readonly>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
        <label>Tanggal</label>
        <input class="form-control" type="date" name="tanggal" value="<?= $realisasi->tanggal?>" placeholder="Tanggal" readonly>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
        <label>Titik Koordinat</label>
        <input class="form-control" type="text" name="titik_koordinat" value="<?= $realisasi->titik_koordinat?>" placeholder="Titik Koordinat" readonly>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
                    <label>Lokasi</label>
                    <input class="form-control" type="text" name="lokasi" value="<?= $realisasi->lokasi?>" placeholder="Lokasi" readonly >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Nama Pohon</label>
                    <input class="form-control" type="text" name="nama_pohon" value="<?= $realisasi->nama_pohon?>" placeholder="Nama Pohon" readonly >
            </div>
            </div>


<div class="col-md-6">
<div class="form-group">
        <label>No Tiang</label>
        <input class="form-control" type="text" name="no_tiang" value="<?= $realisasi->no_tiang?>" placeholder="No Tiang" readonly>
</div>
</div>

<div class="col-md-12">
<label>Foto Sebelum</label>
<div class="form-group">
 
    <img  src="<?= base_url('foto_realisasi/'.$realisasi->foto) ?>" width="150px">
        
</div>
</div>

<div class="col-md-6">
<div class="form-group">
        <label>Prioritas</label>
        <input class="form-control" type="text" name="prioritas" value="<?= $realisasi->prioritas?>" placeholder="Prioritas" readonly>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
        <label>Temuan</label>
        <input class="form-control" type="text" name="temuan" value="<?= $realisasi->temuan?>" placeholder="Temuan" readonly>
</div>
</div>

<div class="col-md-12">
<label>Foto Sesudah</label>
<div class="form-group">
        
    <img  src="<?= base_url('foto_realisasi/'.$realisasi->foto_sesudah) ?>" width="150px">
        
</div>
</div>

<div class="col-md-6">
<div class="form-group">
        <label>Foto Sesudah</label>
        <input type="file" class="form-control" name="foto_sesudah">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
    <label>Keterangan</label>
        <select name="keterangan" class="form-control" required>
        <option value="<?= $realisasi->keterangan?>"><?= $realisasi->keterangan?></option>
        <option value="Pangkas">Pangkas</option>
        <option value="Tebang">Tebang</option>
        <option value="Perlu Padam">Perlu Padam</option>
        </select>
</div>
</div>






<div class="form-group">
    
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-success" >Reset</button>
</div>

<?php } ?> 
            
          <?php echo form_close(); ?> 
          
        </div>
</div>

