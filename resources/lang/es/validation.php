<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute debe ser aceptado(a).',
    'active_url'           => 'La :attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute puede incluir letras solamente.',
    'alpha_dash'           => ':attribute puede incluir solo letras, números y guiones.',
    'alpha_num'            => ':attribute puede incluir solo letras y números.',
    'array'                => ':attribute debe ser un arreglo.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute debe estar entre :min y :max.',
        'file'    => ':attribute debe estar entre :min y :max kilobytes.',
        'string'  => ':attribute debe estar entre :min y :max caracteres.',
        'array'   => ':attribute debe tener entre :min y :max ítems.',
    ],
    'boolean'              => ':attribute debe ser verdadero o falso.',
    'confirmed'            => 'Confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no coincide con el formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe ser de :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => ':attribute tiene dimensiones de imágen inválidas.',
    'distinct'             => ':attribute tiene un valor duplicado.',
    'email'                => ':attribute debe ser una dirección de email válida.',
    'exists'               => ':attribute seleccionado(a) es inválido(a).',
    'file'                 => ':attribute debe ser un archivo.',
    'filled'               => ':attribute debe tener un valor.',
    'image'                => ':attribute debe ser una imágen.',
    'in'                   => ':attribute seleccionado(a) es inválido(a).',
    'in_array'             => 'El  :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero (sin puntos ni comas).',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'The :attribute debe ser una dirección IPv6 válida.',
    'json'                 => ':attribute debe ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no puede ser mayor que :max.',
        'file'    => ':attribute no puede ser más grande que :max kilobytes.',
        'string'  => ':attribute no puede ser mayor de :max caracteres.',
        'array'   => ':attribute no puede tener más de :max ítems.',
    ],
    'mimes'                => ':attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => ':attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute deber ser por lo menos :min.',
        'file'    => ':attribute debe ser de por lo menos :min kilobytes.',
        'string'  => ':attribute debe tener por lo menos :min caracteres.',
        'array'   => ':attribute debe tener por lo menos :min ítems.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser un múmero.',
    'present'              => ':attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => ':attribute es requerido.',
    'required_if'          => ':attribute es requerido cuando :other es :value.',
    'required_unless'      => ':attribute es requerido a menos que :other esté en :values.',
    'required_with'        => ':attribute es requerido cuando :values está presente.',
    'required_with_all'    => ':attribute es requerido cuando :values está presente.',
    'required_without'     => ':attribute es requerido cuando :values no está presente.',
    'required_without_all' => ':attribute es requerido cuando ninguno de :values están presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => ':attribute debe ser :size.',
        'file'    => ':attribute debe tener :size kilobytes.',
        'string'  => ':attribute debe tener :size caracteres.',
        'array'   => ':attribute debe tener :size ítems.',
    ],
    'string'               => ':attribute debe ser una cadena.',
    'timezone'             => ':attribute debe ser una zona válida.',
    'unique'               => ':attribute ya existe.',
    'uploaded'             => ':attribute falló al subir.',
    'url'                  => 'Formato de :attribute es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'n_mileage' => [
            'greater_than' => ':attribute debe ser mayor que el kilometraje actual',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'ordernumber' => 'Orden de reparación',
        'e_firstname' => 'Nombre del asesor',
        'e_lastname' => 'Apellido del asesor',
        'c_firstname' => 'Nombre del cliente',
        'c_lastname' => 'Apellido del cliente',
        'id_number' => 'Cédula del cliente',
        'email' => 'Email',
        'image_name' => 'Imágen',
        'phone' => 'Teléfono',
        'make' => 'Marca',
        'type' => 'Línea',
        'model' => 'Modelo',
        'license' => 'Placa',
        'mileage' => 'Kilometraje',
        'n_mileage' => 'Próximo kilometraje',
        'e_signature' => 'Firma del asesor de servicio',
        'password' => 'Contraseña',
        'description' => 'Piezas a intervenir',
        'price' => 'Costo de la reparación',
        'time' => 'Tiempo de entrega',
        'validity_time' => 'Validez de la cotización',
        'observations' => 'Observaciones',
        'name' => 'Marca y línea'
    ],

    'alpha_spaces' => "El :attribute puede incluir letras y espacios solamente.",
    'license_type' => ":attribute debe estar en formato de 3 letras-3 números o 2 letras-4 números"
];
