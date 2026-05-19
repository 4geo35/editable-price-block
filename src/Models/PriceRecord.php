<?php

namespace GIS\EditablePriceBlock\Models;

use GIS\EditableBlocks\Traits\ShouldBlockItem;
use GIS\EditablePriceBlock\Interfaces\PriceRecordInterface;
use GIS\Fileable\Traits\ShouldImage;
use GIS\TraitsHelpers\Traits\ShouldMarkdown;
use Illuminate\Database\Eloquent\Model;

class PriceRecord extends Model implements PriceRecordInterface
{
    use ShouldBlockItem, ShouldMarkdown, ShouldImage;

    protected $fillable = [
        "description",
        "price",
        "old_price",
        "price_sign",
    ];

    public function getHumanPriceAttribute(): string
    {
        if ($this->price - intval($this->price) > 0)
            return number_format($this->price, 2, ",", " ");
        else
            return number_format($this->price, 0, ",", " ");
    }

    public function getHumanOldPriceAttribute(): string
    {
        if ($this->old_price - intval($this->old_price) > 0)
            return number_format($this->old_price ?? 0, 2, ",", " ");
        else
            return number_format($this->old_price ?? 0, 0, ",", " ");
    }

    public function getRenderSignAttribute(): string
    {
        $value = $this->price_sign;
        if (empty($value)) { return "р."; }
        return $value;
    }

    public function getRenderPriceAttribute(): string
    {
        return "$this->human_price $this->render_sign";
    }

    public function getRenderOldPriceAttribute(): string
    {
        return "$this->human_old_price $this->render_sign";
    }
}
