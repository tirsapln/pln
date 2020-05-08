<div class="col-lg-6">
<div class="panel panel-primary">
    <div class="panel-heading">
    Grafik Word Order
    </div>
        <div class="panel-body">
	
            <script src="<?= base_url() ?>template/highcharts/code/highcharts.js"></script>
            <script src="<?= base_url() ?>template/highcharts/code/modules/exporting.js"></script>
            <script src="<?= base_url() ?>template/highcharts/code/modules/export-data.js"></script>
            <script src="<?= base_url() ?>template/highcharts/code/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">Grafik untuk semua data work order yang di input</p>
            </figure>



		<script type="text/javascript">
// Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Realisasi Data Work Order'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            colors: pieColors,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
            }
        }
    },
    series: [{
        name: 'keterangan',
        data: [ <?php if(count($grafik)>0)
        {
            foreach($grafik as $value)
            {
                echo "['" .$value->keterangan . "',". $value->total."], \n";
            }
        }
        
        ?>
            
            
        ]
    }]
});
		</script>
	
    </div>
    <!-- /.panel -->
</div>

</div>

<div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
            
            
            Lihat Grafik Berdasarkan Work Order
            
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
                    <a href="<?= base_url('grafik/kategori/').$value->tanggal ?>" class="btn btn-primary btn-sm" > <i class="fa fa-search"> </i> Lihat</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            <?php } ?>
            </div>
    </div>
</div>