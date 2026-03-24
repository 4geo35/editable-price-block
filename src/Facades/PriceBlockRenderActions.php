<?php

namespace GIS\EditablePriceBlock\Facades;

use GIS\EditablePriceBlock\Helpers\PriceBlockRenderActionsManager;
use GIS\EditablePriceBlock\Interfaces\PriceRecordInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void expandPriceRecord(PriceRecordInterface $record)
 *
 * @see  PriceBlockRenderActionsManager
 */
class PriceBlockRenderActions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return "price-block-render-actions";
    }
}
