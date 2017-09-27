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

    'accepted'             => ':attribute precisa ser aceito.',
    'active_url'           => ':attribute não é uma URL válida.',
    'after'                => ':attribute precisa ser uma data posterior a :date.',
    'alpha'                => ':attribute pode conter apenas letras.',
    'alpha_dash'           => ':attribute pode conter apenas letras, números, e traços.',
    'alpha_num'            => ':attribute pode conter apenas letras e números.',
    'array'                => ':attribute must be an array.',
    'before'               => ':attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max caracteres.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'O campo :attribute precisa ser verdadeiro ou falso.',
    'confirmed'            => 'O campo de confirmação de :attribute não corresponde.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'O campo :attribute and :other must be different.',
    'digits'               => 'O campo :attribute must be :digits digits.',
    'digits_between'       => 'O campo :attribute must be between :min and :max digits.',
    'dimensions'           => 'O campo :attribute has invalid image dimensions.',
    'distinct'             => 'O campo :attribute field has a duplicate value.',
    'email'                => 'O campo :attribute must be a valid email address.',
    'exists'               => 'O valor :attribute selecionado é inválido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute é obrigatório.',
    'image'                => 'O campo :attribute must be an image.',
    'in'                   => 'O valor :attribute é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute precisa ser um inteiro.',
    'ip'                   => 'O campo :attribute precisa ser um endereço IP válido.',
    'json'                 => 'O campo :attribute precisa ser uma string JSON válida.',
    'max'                  => [
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file'    => 'O campo :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O campo :attribute não pode ser maior que :max caracteres.',
        'array'   => 'O campo :attribute may not have more than :max itens.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'O campo :attribute deve conter no mínimo :min caracteres.',
        'array'   => 'The :attribute must have at least :min itens.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'O campo :attribute precisa ser um número.',
    'present'              => 'O campo :attribute field must be present.',
    'regex'                => 'O campo :attribute está no formato inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute é obrigatório unless :other is in :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum :values está presente.',
    'same'                 => 'Os campos :attribute e :other precisam ser iguais.',
    'size'                 => [
        'numeric' => 'O campo :attribute precisa ser :size.',
        'file'    => 'O campo :attribute precisa ter :size kilobytes.',
        'string'  => 'O campo :attribute precisa ter :size caracteres.',
        'array'   => 'O campo :attribute precisa conter :size itens.',
    ],
    'string'               => 'O campo :attribute precisa ser um texto.',
    'timezone'             => 'O campo :attribute precisa ser um timezone válido.',
    'unique'               => 'O campo :attribute já está sendo usado.',
    'uploaded'             => 'Não foi possível realizar upload de :attribute.',
    'url'                  => 'O formato de :attribute é inválido.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'phone' => [
            'regex' => 'Formato incorreto. Exemplo: (67) 3333-3333'
        ],
        'cellphone' => [
            'regex' => 'Formato incorreto. Exemplo: (67) 99999-9999'
        ]
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
        'name' => 'Nome',
        'symbol' => 'Símbolo',
        'birthDate' => 'Data de Nascimento',
        'cpf' => 'CPF',
        'rg' => 'RG',
        'address' => 'Endereço',
        'phone' => 'Telefone',
        'cellphone' => 'Celular',
        'password' => 'Senha',
        'image' => 'Imagem'
    ],

];
