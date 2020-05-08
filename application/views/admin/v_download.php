<!-- /.col-lg-4 -->
<div class="col-lg-12">
        <div class="panel panel-primary">
             <div class="panel-heading">
            
       </div>
        <div class="panel-body">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    
                    
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($realisasi as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->tanggal ?></td>
                    
                    <td>
                    <a href="<?= base_url('realisasi/pdfkategori/').$value->tanggal ?>" class="btn btn-primary btn-sm" > <i class="fa fa-search"> </i> Download</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            
        </div>
    </div>

    