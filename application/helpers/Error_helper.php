<?php

function RulesLogin($formvalidation)
{
    $formvalidation->set_rules('Usuario', 'Usuario', 'required|trim',
    array('required' => 'El %s es requerido.'));

    $formvalidation->set_rules('Password', 'Password', 'required|trim',
    array('required' => 'La contraseña es requerida.'));

    //Se regresa el arreglo de los errores
    $ErrorArray = $formvalidation->error_array(); 
    return $ErrorArray;
}

function RulesForm($formvalidation)
{

    $formvalidation->set_rules('Nombre', 'Nombre', 'required|trim');

    $formvalidation->set_rules('Paterno', 'Paterno', 'required|trim',
    array('required' => 'Favor de ingresar un Apellido Paterno'));

    $formvalidation->set_rules('Materno', 'Materno', 'required|trim',
    array('required' => 'Favor de ingresar un Apellido Materno'));

    $formvalidation->set_rules('Correo', 'Correo', 'required|is_unique[empleadojuventudes.Correo]',
    array('required'=> 'Se requiere un correo electronico',
          'is_unique' => 'El correo que intenta ingresar ya esta en uso'));

    $formvalidation->set_rules('PuestoLaboral', 'PuestoLaboral', 'required|trim',
    array('required' => 'Se requiere un puesto laboral'));
    
    $formvalidation->set_rules('AreaLaboral', 'AreaLaboral', 'required|trim');
    
    $ErrorArray = $formvalidation->error_array(); 
    return $ErrorArray;
}
