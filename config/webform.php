<?php

return [

    //type = categories the chump
    // edit = if have an elements for editing or not
    // element = element which must displaying as inputs
    // class = class each group form
    // attribute = the attr specific in element input
    // type_champ = type each element Input
    // type_elements =  elements which must switch between it


    'data_form' => [
        'Champ_preconfigures' => [
            'identities' => [
                'name' => 'Identité',
                'champ' => [
                    'firstname' => [
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "first name",
                        'id' => "name",
                        'attr' => ['readonly', 'required'],
                    ],
                    'lastname' => [
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "last name",
                        'id' => "name",
                        'attr' => ['readonly', 'required'],
                    ],
                ],
            ],
            'address' => [
                'name' => 'Adresse',
                'champ' => [
                    'streetone'=>[
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "street one",
                        'id' => "name",
                        'attr' => ['readonly', 'required'],
                    ],
                    'streettwo'=>[
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "street two",
                        'id' => "name",
                        'attr' => ['readonly', 'required'],
                    ],
                ],
            ],
        ],


        'Champs_Standards' => [
            'select' => [
                'name' => 'Select',
                'champ' => [
                    'select'=>[
                        'name' => "Select",
                        'value' => "",
                        'type' => "select",
                        'element' => [
                            "one" => "one"
                        ],
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "street one",
                        'id' => "name",
                        'attr' => ['readonly', 'required'],
                    ],
                ],
            ],
        ]
    ],
];
