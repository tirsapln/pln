<div class="container">
    
    <form method="post" class="form-inline" action="<?php echo base_url("realisasi/form"); ?>" enctype="multipart/form-data">
    <div class="form-group mb-2">
    <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
    <input type="file" class="form-control-file" id="file" name="file">
    <br> </br>
    <input type="submit" name="preview" value="Preview" class="btn btn-success btn-sm">
    </div>
    </form>

    <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }

    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("realisasi/import")."'>";

    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    all data Required <span id='jumlah_kosong'></span> data not empty.
    </div>";

    echo "<table border='1' class='table table-hover' cellpadding='8'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
      <th>Penyulang</th>
      <th>Tanggal</th>
      <th>Titik Koordinat</th>
      <th>No Tiang</th>
      <th>Prioritas</th>
      <th>Foto Sebelum</th>
      <th>Temuan</th>
      <th>Foto Sesudah</th>
      <th>Keterangan</th>
      <th>Lokasi</th>
      <th>Nama Pohon</th>
    </tr>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){
      // Ambil data pada excel sesuai Kolom
      $penyulang = $row['A']; // Ambil data NIS
      $tanggal = $row['B']; // Ambil data nama
      $titik_koordinat = $row['C']; // Ambil data jenis kelamin
      $no_tiang = $row['D']; // Ambil data alamat
      $prioritas = $row['E'];
      $foto = $row['F'];
      $temuan = $row['G'];
      $foto_sesudah = $row['H'];
      $keterangan = $row['I'];
      $lokasi = $row['J'];
      $nama_pohon = $row['K'];


      // Cek jika semua data tidak diisi
      if($penyulang == "" && $tanggal == "" && $titik_koordinat == "" && $no_tiang == "" && $prioritas == "" && $foto == "" && $temuan == "" && $foto_sesudah == "" && $keterangan == "" && $lokasi == "" && $nama_pohon == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $penyulang_td = ( ! empty($penyulang))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $tanggal_td = ( ! empty($tanggal))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $titik_koordinat_td = ( ! empty($titik_koordinat))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $no_tiang_td = ( ! empty($no_tiang))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $prioritas_td = ( ! empty($prioritas))? "" : " style='background: #E07171;'";
        $foto_td = ( ! empty($foto))? "" : " style='background: #E07171;'";
        $temuan_td = ( ! empty($temuan))? "" : " style='background: #E07171;'";
        $foto_sesudah_td = ( ! empty($foto_sesudah))? "" : " style='background: #E07171;'";
        $keterangan_td = ( ! empty($keterangan))? "" : " style='background: #E07171;'";
        $lokasi_td = ( ! empty($lokasi))? "" : " style='background: #E07171;'";
        $nama_pohon_td = ( ! empty($nama_pohon))? "" : " style='background: #E07171;'";



        // Jika salah satu data ada yang kosong
        if($penyulang == "" or $tanggal == "" or $titik_koordinat == "" or $no_tiang == "" or $prioritas == "" or $foto == "" or $temuan == "" or $foto_sesudah == "" or $keterangan == "" or $lokasi == "" or $nama_pohon == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td".$penyulang_td.">".$penyulang."</td>";
        echo "<td".$tanggal_td.">".$tanggal."</td>";
        echo "<td".$titik_koordinat_td.">".$titik_koordinat."</td>";
        echo "<td".$no_tiang_td.">".$no_tiang."</td>";
        echo "<td".$prioritas_td.">".$prioritas."</td>";
        echo "<td".$foto_td.">".$foto."</td>";
        echo "<td".$temuan_td.">".$temuan."</td>";
        echo "<td".$foto_sesudah_td.">".$foto_sesudah."</td>";
        echo "<td".$keterangan_td.">".$keterangan."</td>";
        echo "<td".$lokasi_td.">".$lokasi."</td>";
        echo "<td".$nama_pohon_td.">".$nama_pohon."</td>";

        echo "</tr>";
      }

      $numrow++; // Tambah 1 setiap kali looping
    }

    echo "</table>";

    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";

      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' class='btn btn-info' name='import'>process</button>";
      echo "&nbsp;";
      echo "<a href='".base_url("realisasi")."' class='btn btn-dark'>Cancel</a>";
    }

    echo "</form>";
  }
  ?>

    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
