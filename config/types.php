<?php

return [
    [
        'name' => 'Text',
        'children' => [
            [
                'parent' => 'text',
                'name' => 'Field',
                'type' => 'field'
            ],
            [
                'parent' => 'text',
                'type' => 'textarea',
                'name' => 'Textarea'
            ],
        ]
    ],
    [
        'name' => 'Select',
        'children' => [
            [
                'parent' => 'select',
                'type' => 'dropdown',
                'name' => 'Dropdown'
            ],
            [
                'parent' => 'select',
                'type' => 'checkbox',
                'name' => 'Checkbox'
            ],
            [
                'parent' => 'select',
                'type' => 'radio',
                'name' => 'Radio Button'
            ],
            [
                'parent' => 'select',
                'type' => 'multiple_select',
                'name' => 'Multiple Select'
            ],
        ]
    ],
    [
        'name' => 'Date',
        'children' => [
            [
                'parent' => 'date',
                'type' => 'date',
                'name' => 'Date'
            ],
            [
                'parent' => 'date',
                'type' => 'time',
                'name' => 'Time'
            ],
        ]
    ],
];
