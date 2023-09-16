<script>
function SearchCountry(Countryid) {
    $.ajax({
        url: '<?= base_url('Welcome/ConsultaMapi/') ?>',
        type: 'POST',
        data: {
            'Countryid': Countryid
        },
        success: function(response) {

            let data = JSON.parse(response)
            if (data.ok) {
                CreateModal(data.data);
                console.log('Éxito');
                console.log(data.data); // Aquí están los resultados
            } else {
                console.log('No');
                console.log(data.ok); // Aquí está el mensaje "No se encontraron resultados"
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log('Error en la solicitud AJAX');
        }
    });
}

function CreateModal(data) {
    // Extrae los datos
    var pais = data[0].Pais;

    var modalContent = '<div class="modal-dialog modal-lg">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h5 class="modal-title"> Convocatoria: ' + pais + '</h5>' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</div>' +
        '<div class="modal-body d-flex flex-row justify-end align-start flex-wrap gap-3" style="margin-left: 0;">';



    // Recorrer los datos y agregar los divs para cada país

    var divContent = '<div class="col-lg-4 col-md-6 col-sm-12">' +
        '<div class="card text-center" style="box-shadow: 3px 3px 7px #00000050;">' +
        '<img class="card-img-top" src="<?= base_url('')?>?>" alt="Card image cap">' +
        '<div class="card-body">' +
        '<h2 class="texto-naranja">Conóce más acerca de este apartado <i class="far fa-hand-point-down"></i></h2>' +
        '<p class="texto-azul-oscuro"><b>' + pais + '</b></p>' +
        '<p class="descripcion">' + +'</p>' +
        '<a href="" target="_blank" rel="noopener noreferrer">' +
        '<button class="btn-blue"><i class="fas fa-info-circle"></i> Más información</button> </a> ' +
        '</div>' +
        '</div>' +
        '</div>';

    modalContent += '</div>' + // Cierre del div modal-body
        <?php for ($i = 0; $i < count($Convocatorias); $i++) { ?> '' +
        '<div class="modal-footer">' +
        '<button type="button"  style="" class="btn btn-info" data-dismiss="modal">Ver mas</button>' +
        '<div class="switch-container" style="margin-inline:280px">' +
        '<label class="switch">' +
        '<div style="display:flex; margin-top:-20px;">' +
        '<p>Status</p>' +
        '<input type="checkbox" id="toggle-switch" data-id="<?= $Convocatorias[$i]['IDPais']?>">' +
        '<span class=" slider round"></span>' +
        '</div>' +
        '</label>' +
        '</div>' +
        '<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>' +
        '</div>' +
        '</div>' +
        '</div>';

    var modal = $('<div class="modal" tabindex="-1" role="dialog">' + modalContent + '</div>');
    <?php } ?>
    modal.modal('show');
}
</script>
<?php $this->load->view('StatusCountry-People/EstadoDelPais_js')?>