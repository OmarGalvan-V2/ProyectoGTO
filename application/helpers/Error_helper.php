<?php

function RulesForm($formvalidation){

    $formvalidation->form_validation->set_rules('Nombre', 'Nombre', 'required|trim');

    $formvalidation->form_validation->set_rules('Paterno', 'Paterno', 'required|trim');

    $formvalidation->form_validation->set_rules('Materno', 'Materno', 'required|trim');

    $formvalidation->form_validation->set_rules('Correo', 'Correo', 'required|is_unique[empleadojuventudes.Correo]',
    array('is_unique' => 'El correo que intenta ingresar ya esta en uso'));

    $formvalidation->form_validation->set_rules('PuestoLaboral', 'PuestoLaboral', 'required|trim');
    
    $formvalidation->form_validation->set_rules('AreaLaboral', 'AreaLaboral', 'required|trim');

    $formvalidation->form_validation->set_rules('Usuario', 'Usuario', 'required|trim|is_unique[empleadojuventudes.Usuario]');
    
    $formvalidation->form_validation->set_rules('Password', 'Password', 'required|trim');
    
    $valid = $formvalidation->form_validation->run();
    if($valid == false){
        $respuesta = array(
            'ok' => 2,
            'Errors' => array_merge($valid = $formvalidation->form_validation->error_array())
        );
        return ($respuesta);
    }else{
        $respuesta = array(
            'ok' => 1,
            'Errors' => array_merge($valid = $formvalidation->form_validation->error_array())
        );
        return ($respuesta);
        
    }
}
