<?php

namespace GIS\EditablePriceBlock\Templates;

use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class TabletThirdPriceRecordImage implements ModifierInterface
{
    public function apply(ImageInterface $image): ImageInterface
    {
        return $image->cover(646, 345);
    }
}
