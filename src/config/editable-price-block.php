<?php

return [
    "availableTypes" => [
        "prices" => [
            "title" => env("EDITABLE_PRICE_BLOCK_TITLE", "Цены"),
            "admin" => "eprb-prices",
            "render" => "eprb::types.prices",
        ],
    ],
    "perCol" => 3, // 1,2,3

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
    "templates" => [
        "price-record-image" => \GIS\EditablePriceBlock\Templates\PriceRecordImage::class,
        "tablet-price-record-image" => \GIS\EditablePriceBlock\Templates\TabletPriceRecordImage::class,
        "mobile-price-record-image" => \GIS\EditablePriceBlock\Templates\MobilePriceRecordImage::class,

        "half-price-record-image" => \GIS\EditablePriceBlock\Templates\HalfPriceRecordImage::class,
        "tablet-half-price-record-image" => \GIS\EditablePriceBlock\Templates\TabletHalfPriceRecordImage::class,
        "mobile-half-price-record-image" => \GIS\EditablePriceBlock\Templates\MobileHalfPriceRecordImage::class,

        "third-price-record-image" => \GIS\EditablePriceBlock\Templates\ThirdPriceRecordImage::class,
        "tablet-third-price-record-image" => \GIS\EditablePriceBlock\Templates\TabletThirdPriceRecordImage::class,
        "mobile-third-price-record-image" => \GIS\EditablePriceBlock\Templates\MobileThirdPriceRecordImage::class,
    ],
];
