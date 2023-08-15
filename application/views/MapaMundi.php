<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Mundi</title>

<!-- Resources -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!--Recursos de boostrap-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
        #chartdiv {
            width: 100%;
            height: 400px;
        }
    </style>


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
polygonSeries.mapPolygons.template.on("active", function (active, target) {
  if (previousPolygon && previousPolygon != target) {
    previousPolygon.set("active", false);
  }
  if (target.get("active")) {
    polygonSeries.zoomToDataItem(target.dataItem);
    //Obteniendo el id del pais
    let Countryid = target.dataItem.dataContext.id
    
    //Buscar el pais
    SearchCountry(Countryid)

  }
  else {
    chart.goHome();
  }
  previousPolygon = target;
});

function SearchCountry(Countryid) {
  $.ajax({
    url: '<?= base_url('CRUDESQL/ConsultaConv/')?>' + Countryid, // Pasamos Countryid como parte de la URL
    type: 'GET', // Utilizamos GET ya que el parámetro se pasa como parte de la URL
    dataType: 'json',
    success: function(response) {
      if (response.success) {

        CreateModal(response.data);
        console.log('Éxito');
        console.log(response.data); // Aquí están los resultados
      } else {
        console.log('No');
        console.log(response.message); // Aquí está el mensaje "No se encontraron resultados"
      }
    },
    error: function(xhr, textStatus, errorThrown) {
      console.log('Error en la solicitud AJAX');
    }
  });
}

function CreateModal(data) {
  // Extrae los datos de la respuesta
  var pais = data[0].Pais;
  var descripcion = data[0].Descripcion;
  var instrucciones = data[0].Instrucciones;

  // El resto de tu código para crear el modal utilizando los datos extraídos...
    // Crear el contenido del modal
    var modalContent = '<div class="modal-dialog modal-lg">' +
    '<div class="modal-content">' +
    '<div class="modal-header">' +
    '<h5 class="modal-title">Convocatorias en '+ Pais +' </h5>' +
    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>' +
    '<div class="modal-body">' +
    '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-2">' +
    '<div class="card  text-center" style="box-shadow: 3px 3px 7px #00000050;">' +
    '<img class="card-img-top" src="" alt="Card image cap">' +
    '<div class="card-body">'+
    '<h2 class="texto-azul-oscuro"><b></b></h2>'+
    '<h2 class="texto-naranja">Conóce más acerca de este apartado <i class="far fa-hand-point-down"></i></h2>'+
    '<a href="" target="_blank" rel="noopener noreferrer">' +
		'<button class="btn-blue"><i class="fas fa-info-circle"></i> Más información</button> </a> ' +
    '</div>'+
    '</div>' + 
    '</div>'+
    '</div>' +
    '<div class="modal-footer">' +
    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>' +
    '</div>' +
    '</div>' +
    '</div>';

  // Crear el modal y mostrarlo
  var modal = $('<div class="modal" tabindex="-1" role="dialog">' + modalContent + '</div>');
  modal.modal('show');

}



// Add zoom control
// https://www.amcharts.com/docs/v5/charts/map-chart/map-pan-zoom/#Zoom_control
chart.set("zoomControl", am5map.ZoomControl.new(root, {}));



// Set clicking on "water" to zoom out
chart.chartContainer.get("background").events.on("click", function () {
  chart.goHome();
})

// Make stuff animate on load
chart.appear(1000, 100);

}); // end am5.ready()


</script>

</html>
