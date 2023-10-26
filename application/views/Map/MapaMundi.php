<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Mundial</title>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/geodata/lang/ES.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script>

    <!--Recursos de boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!--Recursos de CSS-->
    <link rel="stylesheet" href=<?= base_url('CSS/InterfazMap.css') ?>>
    <link rel="stylesheet" href=<?= base_url('CSS/InterfazMapa.css') ?>>

    <!-- Icono de la página (favicon) -->
    <link rel="shortcut icon" href="<?= base_url() . "img/impulso.ico" ?>">

</head>
<style>
    .estado {
        display: flex;
    }

    .cuadro {
        width: 20px;
        height: 20px;
    }

    .activo {
        background-color: #000599;
        color: white;
        top: 0;
    }

    .inactivo {
        background-color: #ff6a13;
        color: white;
        top: 50px;
    }
</style>

<body>
<div id="chartdiv" style="width: auto;"></div>
    <div class="col-lg-12 col-lg-6  col-sm-12">
        <div>
        <div class="estado">
            <div class="cuadro activo"></div>
            <p>Paises Activos</p>
        </div>
        <div class="estado">
            <div class="cuadro inactivo"></div>
            <p>Paises Inactivos</p>
        </div>
        </div>
    </div>
</body>
<!-- Chart code -->
<script>
    am5.ready(function() {
        var continents = {
            "AF": 0,
            "AN": 1,
            "AS": 2,
            "EU": 3,
            "NA": 4,
            "OC": 5,
            "SA": 6
        }

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");
        var colors = am5.ColorSet.new(root, {});


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create the map chart
        // https://www.amcharts.com/docs/v5/charts/map-chart/
        var chart = root.container.children.push(am5map.MapChart.new(root, {
            panX: "rotateX",
            projection: am5map.geoMercator()
        }));


        // Create polygon series for the world map
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
        var worldSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_worldLow,
            geodataNames: am5geodata_lang_ES,
            exclude: ["AQ"]
        }));

        worldSeries.mapPolygons.template.setAll({
            tooltipText: "{name}",
            interactive: true,
            fill: am5.color(0xaaaaaa),
            templateField: "polygonSettings"
        });

        worldSeries.mapPolygons.template.states.create("hover", {
            fill: colors.getIndex(9)
        });



        // Create polygon series for the country map
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
        var countrySeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
            visible: false
        }));

        countrySeries.mapPolygons.template.setAll({
            tooltipText: "{name}",
            interactive: true,
            fill: am5.color(0xaaaaaa)
        });

        countrySeries.mapPolygons.template.states.create("hover", {
            fill: colors.getIndex(9)
        });

        worldSeries.mapPolygons.template.events.on("click", (ev) => {
            var dataItem = ev.target.dataItem;
            let Countryid = ev.target.dataItem.dataContext.id
            SearchCountry(Countryid);

        });

        // Declarar arrays para almacenar datos de 'Status' e 'id_pais'
        var Status = [];
        var id_pais = [];

        // Utilizar PHP para llenar los arrays 'Status' e 'id_pais'
        <?php for ($i = 0; $i < count($Convocatorias); $i++) { ?>
            // Agregar el valor 'Status' del país al array 'Status'
            Status.push("<?= $Convocatorias[$i]['Status']; ?>");
            // Agregar el valor 'IDPais' del país al array 'id_pais'
            id_pais.push("<?= $Convocatorias[$i]['IDPais']; ?>");
        <?php } ?>

        // Configurar datos para los países en el mapa
        var data = [];
        var contador = 0;

        // Iterar sobre los datos de países proporcionados por 'am5geodata_data_countries2'
        for (var id in am5geodata_data_countries2) {
            if (am5geodata_data_countries2.hasOwnProperty(id)) {
                var country = am5geodata_data_countries2[id];
                if (country.maps.length) {
                    if (Status[contador] == '1') {
                        // Configurar datos para países con 'Status' igual a '1'
                        data.push({
                            id: id,
                            map: country.maps[0],
                            polygonSettings: {
                                fill: am5.color(0x000599), // Color de relleno para estos países
                            }
                        });
                        contador++;
                    } else {
                        // Configurar datos para países con 'Status' diferente de '1'
                        data.push({
                            id: id,
                            map: country.maps[0],
                            polygonSettings: {
                                fill: am5.color(0xff6a13), // Color de relleno para estos países
                            }
                        });
                        contador++;
                    }
                }
            }
        }

        // Establecer los datos de los países en el objeto 'worldSeries.data'
        worldSeries.data.setAll(data);

        // Add zoom control
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-pan-zoom/#Zoom_control
        chart.set("zoomControl", am5map.ZoomControl.new(root, {}));



        // Set clicking on "water" to zoom out
        chart.chartContainer.get("background").events.on("click", function() {
            chart.goHome();
        })

        // Make stuff animate on load
        chart.appear(1000, 100);

    }); // end am5.ready()

    function numeroAleatorio(min, max) {
        return Math.round(Math.random() * (max - min) + min);
    }
</script>

<?php $this->load->view('Map/SearchCountry_js') ?>

</html>



</div>