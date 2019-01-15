<?php

$aspectRatio = function ($constraint){
    $constraint->aspectRatio();
    $constraint->upsize();
};

$aspectRatioUpsize = function ($constraint){
    $constraint->aspectRatio();
};

return [

    'products' => [
        'thumb' => [
            'fit' => [220,220]
        ],
        '188x134' => [
            'fit' => [188,134]
        ],
        '450x290' => [
            'fit' => [450,290]
        ],
        '1000x667' => [
            'fit' => [1000,667]
        ]
    ],

    'sliders' => [
        'thumb' => [
            'fit' => [220,220]
        ],
        'big' => [
            'fit' => [1600, 650]
        ]
    ],

];
