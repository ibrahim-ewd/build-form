<?php

return [

        //type = categories the chump
        // edit = if have an elements for editing or not
        // element = element which must displaying as inputs
        // class = class each group form
        // attribute = the attr specific in element input
        // type_champ = type each element Input
        // type_elements =  elements which must switch between it


	'data_form'=>[
		'Champ_preconfigures'=>[
			'identities' => [
				'name'=>'Identité',
				'champ'=> [
                        [
                            'name'=>"name",
                            'value'=>"",
                            'type'=>"text",
                            'class'=>"form-controller",
                            'style'=>"",
                            'placeholder'=>"name",
                            'id'=>"name",
                            'attr'=>['readonly','required'],
                        ],
                        [
                            'name'=>"lastname",
                            'value'=>"",
                            'type'=>"text",
                            'class'=>"form-controller",
                            'style'=>"",
                            'placeholder'=>"last name",
                            'id'=>"name",
                            'attr'=>['readonly','required'],
                        ] ,
                ],
			],
			'address' => [
				'name'=>'Adresse',
                'champ'=> [
                    [
                        'name'=>"street one",
                        'value'=>"",
                        'type'=>"text",
                        'class'=>"form-controller",
                        'style'=>"",
                        'placeholder'=>"street one",
                        'id'=>"name",
                        'attr'=>['readonly','required'],
                    ],
                    [
                        'name'=>"street two",
                        'value'=>"",
                        'type'=>"text",
                        'class'=>"form-controller",
                        'style'=>"",
                        'placeholder'=>"street two",
                        'id'=>"name",
                        'attr'=>['readonly','required'],
                    ],
                ],
			],
		],



		'Champs_Standards'=>[
            'select' => [
                'name'=>'Select',
                'champ'=> [
                    [
                        'name'=>"Select",
                        'value'=>"",
                        'type'=>"select",
                        'element' => [
                          "one" => "one"
                        ],
                        'class'=>"form-controller",
                        'style'=>"",
                        'placeholder'=>"street one",
                        'id'=>"name",
                        'attr'=>['readonly','required'],
                    ],
                ],
            ],
		]
	],
];
