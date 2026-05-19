<?php

namespace GIS\EditablePriceBlock\Helpers;

use GIS\EditablePriceBlock\Interfaces\PriceRecordInterface;

class PriceBlockRenderActionsManager
{
    public function expandPriceRecord(PriceRecordInterface $record): void
    {
        $record->load("image");
    }
}
