<link rel="stylesheet" href=<?= base_url('CSS/Searchcountry.css') ?>>

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
        let pais = data[0].Pais;
        let IDPais = data[0].IDPais;
        let Estado = data[0].Status;
        let Academico = data[0].Academico;
        let Profesional = data[0].Profesional;
        let Social = data[0].Social;

        var modalContent = `
        <div class="modal-dialog modal-lg modal-with-background">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title ml-auto"> Convocatoria: ${pais} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="accordion">
    `;

        // Verificar y agregar la Justificacion si tiene datos
        if (Academico) {
            modalContent += `
            <div class="section" id="Academico" name="Academico">
                <h4 class="section-title" onclick="toggleSection('Academico')">Academico <i class="fas fa-chevron-down"></i></h4>
                <div class="section-content hidden">
                    <p>${Academico}</p>
                </div>
            </div>
        `;
        }

        // Verificar y agregar el Beneficio si tiene datos
        if (Profesional) {
            modalContent += `
            <div class="section" id="Profesional" name="Profesional">
                <h4 class="section-title" onclick="toggleSection('Profesional')">Profesional <i class="fas fa-chevron-down"></i></h4>
                <div class="section-content hidden">
                    <p>${Profesional}</p>
                </div>
            </div>
        `;
        }

        // Verificar y agregar los Datos si tiene datos
        if (Social) {
            modalContent += `
            <div class="section" id="Social" name="Social">
                <h4 class="section-title" onclick="toggleSection('Social')">Social <i class="fas fa-chevron-down"></i></h4>
                <div class="section-content hidden">
                    <p>${Social}</p>
                </div>
            </div>
        `;
        }

        modalContent += `
                        <div class="text-center mr-auto ml-auto">
                            <a class="btn btn-primary edit-button" href="<?= base_url() . "Welcome/EditarMapText?IDPais=" ?>${IDPais}">
                            <i class="fas fa-pencil-alt"></i> Editar Texto </a>
                        </div>
`;
        if (Estado == '1') {
            modalContent += `
            </div> <!-- Cierre del div "accordion" -->
            </div> <!-- Cierre del div "modal-body" -->
                <div class="modal-footer">
                <a class="btn btn-outline-primary ms-auto" target="_blank" href="https://solicitudes.juventudesgto.com/profiler">Ver más</a>
                    <div class="switch-container mx-auto">
            <label class="switch">
                <div style="display:flex; margin-top: -20px;">
                    <p>Status</p>
                    <input type="checkbox" ${Estado ? 'checked' : ''} id="${IDPais}" onclick="actualizar(this)">                    <span class="slider round"></span>
                </div>
            </label>
        </div>
            <a class="btn btn-outline-info ms-auto" target="_blank" href="">Más convocatorias</a>
        </div>

            </div> <!-- Cierre del div "modal-content" -->
            </div> <!-- Cierre del div "modal-dialog" -->
    `;
        } else {
            modalContent += `
                </div> <!-- Cierre del div "accordion" -->
            </div> <!-- Cierre del div "modal-body" -->
            <div class="modal-footer">
                    <a class="btn btn-outline-primary ms-auto" target="_blank" href="https://solicitudes.juventudesgto.com/profiler">Ver más</a>
                    <div class="switch-container mx-auto">
                         <label class="switch">
                        <div style="display:flex; margin-top: -20px;">
                            <p>Status</p>
                            <input type="checkbox"  id="${IDPais}" onclick="actualizar(this)">                        <span class="slider round"></span>
                </div>
            </label>
        </div>
            <a class="btn btn-outline-info ms-auto" target="_blank" href="">Más convocatorias</a>
        </div>
        </div> <!-- Cierre del div "modal-content" -->
    </div> <!-- Cierre del div "modal-dialog" -->
    `;
        }

        var modal = $('<div class="modal" tabindex="-1" role="dialog">' + modalContent + '</div>');

        modal.modal('show');
    }


    function toggleSection(sectionId) {
        const sectionContent = $(`#${sectionId} .section-content`);
        sectionContent.slideToggle();
    }
</script>
<?php $this->load->view('StatusCountry-People/EstadoDelPais_js') ?>