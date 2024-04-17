<?php
// UserCampos.php

return [
    'id' => [
        // lista
        'titulo1' => 'Id',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Id',
        'visible2' => false,
        // tipo de campo
        'tipo' => 'integer',
        'decimal' => 0,
    ],

    'name' => [
        // lista
        'titulo1' => 'Nombre',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Nombre',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'string',
    ],

    'email' => [
        // lista
        'titulo1' => 'eMail',
        'visible1' => true,
        // ingreso
        'titulo2' => 'eMail',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'mail',
    ],

    'password' => [
        // lista
        'titulo1' => '',
        'visible1' => false,
        // ingreso
        'titulo2' => 'Contraseña',
        'visible2' => true,
        // tipo de campo
        'tipo' => 'password',
    ],

    // 'profile_photo_path' => [
    //     // lista
    //     'titulo1' => 'Foto',
    //     'visible1' => true,
    //     // ingreso
    //     'titulo2' => 'Foto',
    //     'visible2' => true,
    //     // tipo de campo
    //     'tipo' => 'image',
    // ],

    // 'is_active' => [
    //     // lista
    //     'titulo1' => 'Activo',
    //     'visible1' => true,
    //     // ingreso
    //     'titulo2' => 'Activo',
    //     'visible2' => true,
    //     // tipo de campo
    //     'tipo' => 'checkit',
    // ],

    'created_at' => [
        // lista
        'titulo1' => 'Creado',
        'visible1' => true,
        // ingreso
        'titulo2' => 'Creado',
        'visible2' => false,
        // tipo de campo
        'tipo' => 'date',
    ],
];
