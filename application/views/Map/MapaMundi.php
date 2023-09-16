<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Mundi</title>

    <!-- Resources -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!--Recursos de boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!--Recursos de CSS-->
    <link rel="stylesheet" href=<?= base_url('CSS/InterfazMap.css') ?>>


</head>

<body>
    <div id="chartdiv"></div>


</body>
<!-- Chart code -->
<script>
am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);


    // Create the map chart
    // https://www.amcharts.com/docs/v5/charts/map-chart/
    var chart = root.container.children.push(am5map.MapChart.new(root, {
        panX: "translateX",
        panY: "translateY",
        projection: am5map.geoMercator()
    }));


    //Paises
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
    var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_worldLow,
        exclude: ["AQ"]
    }));


    //Datos solicitados de los paises con el mouse por encima

    polygonSeries.mapPolygons.template.setAll({
        tooltipText: "{name} - {id}",
        toggleKey: "active",
        interactive: true,
    });

    //Muestra los datos
    polygonSeries.mapPolygons.template.states.create("hover", {
        fill: root.interfaceColors.get("primaryButtonHover")

    });


    polygonSeries.mapPolygons.template.states.create("active", {
        fill: root.interfaceColors.get("primaryButtonHover")
    });


    //
    var previousPolygon;
    polygonSeries.mapPolygons.template.on("active", function(active, target) {
        if (previousPolygon && previousPolygon != target) {
            previousPolygon.set("active", false);
        }
        if (target.get("active")) {
            //polygonSeries.zoomToDataItem(target.dataItem);
            //Obteniendo el id del pais
            let Countryid = target.dataItem.dataContext.id

            //Buscar el pais
            SearchCountry(Countryid)

        } else {
            chart.goHome();
        }
        previousPolygon = target;
    });





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
</script>

<?php $this->load->view('Map/SearchCountry_js')?>

</html>



</div>