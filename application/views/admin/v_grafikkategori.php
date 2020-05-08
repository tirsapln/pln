<div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">
    Grafik Word Order Berdasarkan Tanggal
    </div>
        <div class="panel-body">
	
            <script src="<?= base_url() ?>template/highcharts/code/highcharts.js"></script>
            <script src="<?= base_url() ?>template/highcharts/code/modules/exporting.js"></script>
            <script src="<?= base_url() ?>template/highcharts/code/modules/export-data.js"></script>
            <script src="<?= base_url() ?>template/highcharts/code/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description"></p>
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
