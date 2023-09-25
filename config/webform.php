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
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-6 mb-3",
                        'style' => "",
                        'placeholder' => "first name",
                        'id' => "firstname",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,
//                        'attribute' => "readonly required",
                    ],
                    'lastname' => [
                        'label' => "last name",
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-6 mb-3",
                        'style' => "",
                        'placeholder' => "last name",
                        'id' => "lastname",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,

                    ],
                    'civility' => [
                        'label' => "civility",
                        'notice' => "",
                        'value' => "",
                        'type' => "select",
                        'element' => [
                            ["one", "one"],
                            ["two" ,"two"]
                        ],
                        'class' => "form-control",
                        'class_group' => "col-6 mb-3",
                        'style' => "",
                        'placeholder' => "civility",
                        'id' => "civility",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,

                    ],
                ],
            ],
            'address' => [
                'name' => 'address',
                'champ' => [
                    'streetone' => [
                        'label' => "street one",
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-6 mb-3",
                        'style' => "",
                        'placeholder' => "street one",
                        'id' => "streetone",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,

                    ],
                    'streettwo' => [

                        'label' => "street two",
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-6 mb-3",
                        'style' => "",
                        'placeholder' => "street one",
                        'id' => "streetone",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,
                    ],
                    'codepostal' => [
                        'label' => "code postal",
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-6 mb-3",
                        'style' => "",
                        'placeholder' => "code postal",
                        'id' => "codepostal",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,
                    ],
                    'city' => [
                        'label' => "city",
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-6 mb-3",
                        'style' => "",
                        'placeholder' => "city",
                        'id' => "city",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,
                    ],
                ],
            ],
            'phone' => [
                'name' => 'phone',
                'champ' => [
                    'phone' => [
                        'label' => "phone",
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-12 mb-3",
                        'style' => "",
                        'placeholder' => "phone",
                        'id' => "phone",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,
                    ],
                ],
            ],
            'email' => [
                'name' => 'email',
                'champ' => [
                    'email' => [
                        'label' => "email",
                        'notice' => "",
                        'value' => "",
                        'type' => "text",
                        'class' => "form-control",
                        'class_group' => "col-12 mb-3",
                        'style' => "",
                        'placeholder' => "email",
                        'id' => "email",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,
                    ],
                ],
            ],
            'longText' => [
                'name' => 'longText',
                'champ' => [
                    'longText' => [
                        'label' => "longText",
                        'notice' => "",
                        'value' => "",
                        'type' => "textarea",
                        'class' => "form-control",
                        'class_group' => "col-12 mb-3",
                        'style' => "",
                        'placeholder' => "longText",
                        'id' => "longText",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,
                    ],
                ],
            ],
            'date' => [
                'name' => 'date',
                'champ' => [
                    'date' => [
                        'label' => "date",
                        'notice' => "",
                        'value' => "",
                        'type' => "date",
                        'class' => "form-control",
                        'class_group' => "col-12 mb-3",
                        'style' => "",
                        'placeholder' => "date",
                        'id' => "date",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,




                    ],
//                    'hour' => [
//                        'label' => "hour",
//                        'notice' => "",
//                        'value' => "",
//                        'type' => "hour",
//                        'class' => "form-control",
//                        'class_group' => "col-6 mb-3",
//                        'style' => "",
//                        'placeholder' => "hour",
//                        'id' => "hour",
//                        'required' => true,
//                        'readonly' => false,
//                        'visibility' => true,
//                    ],
                ],
            ],
        ],


        'Champs_Standards' => [
            'select' => [
                'name' => 'select',
                'champ' => [
                    'select' => [
                        'name' => "Select",
                        'label' => "Select",
                        'type' => "select",
                        'notice' => "",
                        'value' => "",
                        'element' => [
                            ["one", "one"],
                            ["two" ,"two"]
                        ],
                        'class' => "form-control",
                        'class_group' => "col-12 mb-3",
                        'style' => "",
                        'placeholder' => "Select",
                        'id' => "Select",
                        'required' => true,
                        'readonly' => false,
                        'visibility' => true,

                    ],
                ],
            ],
            'paragraph' => [
                'name' => 'paragraph',
                'champ' => [
                    'paragraph' => [
                        'name' => "paragraph",
                        'label' => null,
                        'placeholder' => null,
                        'type' => "text",
                        'notice' => "",
                        'value' => "change this text",
                        'class' => "text",
                        'class_group' => "col-12 mb-3",
                        'style' => "",
                        'id' => "paragraph",
                        'required' => null,
                        'readonly' => null,
                        'visibility' => true,
                    ],
                ],
            ],
        ]
    ],
];
