<?php

namespace GIS\EditablePriceBlock\Livewire\Admin\Types;

use GIS\EditableBlocks\Traits\CheckBlockAuthTrait;
use GIS\EditableBlocks\Traits\EditBlockTrait;
use GIS\EditableBlocks\Traits\PlaceholderBlockTrait;
use GIS\EditablePriceBlock\Interfaces\PriceRecordInterface;
use GIS\EditablePriceBlock\Models\PriceRecord;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class PricesWire extends Component
{
    use EditBlockTrait, CheckBlockAuthTrait, PlaceholderBlockTrait, WithFileUploads;

    public bool $displayData = false;
    public bool $displayDelete = false;
    public bool $displayDeleteImage = false;

    public int|null $itemId = null;

    public string $title = "";
    public string $description = "";
    public TemporaryUploadedFile|null $image = null;
    public string|null $imageUrl = null;
    public float|null $price = null;
    public float|null $oldPrice = null;
    public string $startDate = "";
    public string $priceSign = "";

    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:150"],
            "image" => ["nullable", "image"],
            "price" => ["nullable", "numeric", "min:0"],
            "oldPrice" => ["nullable", "numeric", "min:0"],
            "priceSign" => ["nullable", "string", "max:50"],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            "title" => "Заголовок",
            "image" => "Изображение",
            "price" => "Цена",
            "oldPrice" => "Цена без скидки",
            "priceSign" => "Подпись к цене",
        ];
    }

    public function render(): View
    {
        $items = $this->block->items()->with("recordable")->orderBy("priority")->get();
        return view("eprb::livewire.admin.types.prices-wire", compact("items"));
    }

    public function closeData(): void
    {
        $this->resetFields();
        $this->displayData = false;
    }

    public function showCreate(): void
    {
        $this->resetFields();
        if (! $this->checkAuth("create")) { return; }
        $this->displayData = true;
    }

    public function store(): void
    {
        if (! $this->checkAuth("create")) { return; }
        $this->validate();

        $modelClass = config("editable-price-block.customPriceRecordModel") ?? PriceRecord::class;
        $record = $modelClass::create([
            "description" => $this->description,
            "price" => $this->price,
            "old_price" => $this->oldPrice,
            "price_sign" => $this->priceSign,
        ]);
        /**
         * @var PriceRecordInterface $record
         */
        $record->livewireImage($this->image);
        $record->item()->create([
            "title" => $this->title,
            "block_id" => $this->block->id
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно добавлен");
    }

    public function showEdit(int $id): void
    {
        $this->resetFields();
        $this->itemId = $id;
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;

        $this->title = $item->title;
        $this->description = $record->description;
        $this->price = $record->price;
        $this->oldPrice = $record->old_price;
        $this->priceSign = $record->price_sign;
        if ($record->image_id) {
            $record->load("image");
            $this->imageUrl = $record->image->storage;
        } else $this->imageUrl = null;

        $this->displayData = true;
    }

    public function update(): void
    {
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;
        /**
         * @var PriceRecordInterface $record
         */
        $record->update([
            "description" => $this->description,
            "price" => $this->price,
            "old_price" => $this->oldPrice,
            "price_sign" => $this->priceSign,
        ]);
        $record->livewireImage($this->image);
        $item->update([
            "title" => $this->title,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно обновлен");
    }

    public function showClearImage(): void
    {
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $this->displayDeleteImage = true;
    }

    public function closeClearImage(): void
    {
        $this->displayDeleteImage = false;
    }

    public function clearImage(): void
    {
        $item = $this->findModel();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;
        /**
         * @var PriceRecordInterface $record
         */
        $record->clearImage();
        if (isset($this->imageUrl)) { $this->imageUrl = null; }
        if (isset($this->coverUrl)) { $this->coverUrl = null; }
        $this->closeClearImage();
    }

    protected function resetFields(): void
    {
        $this->reset("title", "description", "price", "oldPrice", "priceSign", "imageUrl", "image", "itemId");
    }
}
