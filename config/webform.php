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
                'name' => 'identity',
                'champ' => [
                    'firstname' => [
                        'label' => "first name",
                        'notice' => "notice first name",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "first name",
                        'id' => "firstname",
                        'attr' => ['readonly', 'required'],
                    ],
                    'lastname' => [
                        'label' => "last name",
                        'notice' => "notice last name",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "last name",
                        'id' => "lastname",
                        'attr' => ['readonly', 'required'],
                    ],
                ],
            ],
            'address' => [
                'name' => 'address',
                'champ' => [
                    'streetone'=>[
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "street one",
                        'id' => "streetone",
                        'attr' => ['readonly', 'required'],
                    ],
                    'streettwo'=>[
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'style' => "",
                        'placeholder' => "street two",
                        'id' => "streettwo",
                        'attr' => ['readonly', 'required'],
                    ],
                ],
            ],
        ],


        'Champs_Standards' => [
            'select' => [
                'name' => 'select',
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
                        'id' => "select",
                        'attr' => ['readonly', 'required'],
                    ],
                ],
            ],
        ]
    ],
];
