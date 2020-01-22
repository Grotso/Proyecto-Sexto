<!DOCTYPE html>
<html>

<head>

<title>Grafico Distancia Ultrasonido</title>

</head>

<script src="<?echo base_url()?>jquery-3.4.1.min.js"></script>
<script src="<?echo base_url()?>highcharts.js"></script>
<script src="<?echo base_url()?>exporting.js"></script>

<style type="text/css">
.highcharts-figure, .highcharts-data-table table {
  min-width: 320px; 
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 400px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

        </style>

<body>
    
<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Gráfico de temperatura que muestra la actualización de datos cada segundo, con la eliminación de datos antiguos.
    </p>
</figure>

<!--
<script type="text/javascript">
var intervaloTiempo;
var cont=1;

Highcharts.chart('container', {
    chart: {
        type: 'spline',
        animation: Highcharts.svg, // don't animate in old IE
        marginRight: 10,
        events: {
            load: function () {

                // set up the updating of the chart each second
                var series = this.series[0];

                if(intervaloTiempo){
                    window.clearInterval(intervaloTiempo);
                }
                var intervaloTiempo = setInterval( async function(){
                                 var x = (new Date()).getTime(),
                                     y = await fetch('<?//php echo base_url();?>index.php/ultrasonido_model/grafica')
                                                    .then( respuesta => respuesta.text() );
                                 console.log('y=',y);
                                 series.addPoint([x, y], true, true);
                              }
                            , 1000
                            );
            }
        }
    },

    time: {
        useUTC: false
    },

    title: {
        text: 'Temperatura'
    },

    accessibility: {
        announceNewData: {
            enabled: true,
            minAnnounceInterval: 15000,
            announcementFormatter: function (allSeries, newSeries, newPoint) {
                if (newPoint) {
                    return 'New point added. Value: ' + newPoint.y;
                }
                return false;
            }
        }
    },

    xAxis: {
        title: {
            text: 'Tiempo'
        },
        type: 'datetime',
        tickPixelInterval: 150
    },

    yAxis: {
        title: {
            text: 'Temperatura'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },

    tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
    },

    legend: {
        enabled: false
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Random data',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;

            for (i = -19; i <= 0; i += 1) {
                data.push({
                    x: time + i * 1000,
                    y: 0
                });
            }
            return data;
        }())
    }]
});
        </script>--> 

<?php

foreach ($reg -> result_array() as $r) {
    echo $r['distancia']."<br>";
    echo $r['fecha']."<br>";
}

?>

</body>

</html>