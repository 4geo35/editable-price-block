<?php

namespace GIS\EditablePriceBlock\Templates;

use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class HalfPriceRecordImage implements ModifierInterface
{
    public function apply(ImageInterface $image): ImageInterface
    {
        return $image->cover(318, 323);
    }
}
