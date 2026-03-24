<?php

return [
    "availableTypes" => [
        "prices" => [
            "title" => env("EDITABLE_PRICE_BLOCK_TITLE", "Цены"),
            "admin" => "eprb-prices",
            "render" => "eprb::types.prices",
        ],
    ],

    "expandRender" => [
        "expandPriceRecord" => [
            "class" => \GIS\EditablePriceBlock\Facades\PriceBlockRenderActions::class,
            "method" => "expandPriceRecord"
        ],
    ],

    // Models
    "customPriceRecordModel" => null,
    "customPriceRecordModelObserver" => null,

    // Manager
    "customBlockRecordActionsManager" => null,

    // Components
    "customPriceComponent" => null,

    // Templates
    "templates" => [],
];
