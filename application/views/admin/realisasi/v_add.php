<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
    Tambah Data Realisasi
    </div>
        <div class="panel-body">
        
            <?php

            if(isset($error_upload)) {
                echo'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
                            
            }
            echo form_open_multipart('realisasi/add');
            ?>

            <div class="col-md-4">
            <div class="form-group">
                    <label>Penyulang</label>
                    <input class="form-control" type="text" name="penyulang" placeholder="Penyulang" required>
            </div>
            </div>

            
            <div class="col-md-4">
            <div class="form-group">
                    <label>Titik Koordinat</label>
                    <input class="form-control" type="text" name="titik_koordinat" placeholder="Titik Koordinat">
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" placeholder="Tanggal">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Lokasi</label>
                    <input class="form-control" type="text" name="lokasi" placeholder="Lokasi" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Nama Pohon</label>
                    <input class="form-control" type="text" name="nama_pohon" placeholder="Nama Pohon" >
            </div>
            </div>
            


            <div class="col-md-6">
            <div class="form-group">
                    <label>No Tiang</label>
                    <input class="form-control" type="text" name="no_tiang" placeholder="No Tiang" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label>Prioritas</label>
                    <input class="form-control" type="text" name="prioritas" placeholder="Prioritas">
            </div>
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
                    <input class="form-control" type="text" name="temuan" placeholder="Temuan">
            </div>
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
                    <option value="-">--Pilih Keterangan--</option>
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
          <?php echo form_close(); ?>  
        </div>
</div>

