<?php

namespace GIS\EditablePriceBlock\Observers;

use GIS\EditablePriceBlock\Interfaces\PriceRecordInterface;

class PriceRecordObserver
{
    public function updated(PriceRecordInterface $record): void
    {
        $item = $record->item;
        if (! $item) { return; }
        $item->touch();
    }
}
