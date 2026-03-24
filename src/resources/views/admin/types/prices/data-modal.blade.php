<x-tt::modal.dialog wire:model="displayData">
    <x-slot name="title">{{ $itemId ? "Редактировать" : "Добавить" }} элемент</x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="{{ $itemId ? 'update' : 'store' }}" class="space-y-indent-half"
              id="priceBlockDataForm-{{ $block->id }}">

            <div>
                <label for="priceBlockTitle-{{ $block->id }}" class="inline-block mb-2">
                    Заголовок<span class="text-danger">*</span>
                </label>
                <input type="text" id="priceBlockTitle-{{ $block->id }}"
                       class="form-control {{ $errors->has("title") ? "border-danger" : "" }}"
                       required
                       wire:loading.attr="disabled"
                       wire:model="title">
                <x-tt::form.error name="title"/>
            </div>

            <div>
                <label for="priceBlockImage-{{ $block->id }}" class="inline-block mb-2">Изображение</label>
                <input type="file" id="priceBlockImage-{{ $block->id }}"
                       class="form-control {{ $errors->has('image') ? 'border-danger' : '' }}"
                       wire:loading.attr="disabled"
                       wire:model.lazy="image">
                <x-tt::form.error name="image"/>
                @include("tt::admin.delete-image-button")
            </div>

            <div>
                <label for="priceBlockPrice-{{ $block->id }}" class="inline-block mb-2">
                    Цена
                </label>
                <input type="number" step="0.1" id="priceBlockPrice-{{ $block->id }}"
                       class="form-control {{ $errors->has("price") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="price">
                <x-tt::form.error name="price"/>
            </div>

            <div>
                <label for="priceBlockPriceSign-{{ $block->id }}" class="inline-block mb-2">
                    Подпись к цене
                </label>
                <input type="text" id="priceBlockPriceSign-{{ $block->id }}"
                       class="form-control {{ $errors->has("priceSign") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="priceSign">
                <x-tt::form.error name="priceSign"/>
            </div>

            <div>
                <label for="priceBlockOldPrice-{{ $block->id }}" class="inline-block mb-2">
                    Старая цена
                </label>
                <input type="number" step="0.1" id="priceBlockOldPrice-{{ $block->id }}"
                       class="form-control {{ $errors->has("oldPrice") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="oldPrice">
                <x-tt::form.error name="oldPrice"/>
            </div>

            <div>
                <label for="priceBlockDescription-{{ $block->id }}" class="flex justify-start items-center mb-2">
                    Описание
                    @include("tt::admin.description-button", ["id" => "priceBlockDescription-{$block->id}-Hidden"])
                </label>
                @include("tt::admin.description-info", ["id" => "priceBlockDescription-{$block->id}-Hidden"])
                <textarea id="priceBlockDescription-{{ $block->id }}" class="form-control !min-h-52 {{ $errors->has('description') ? 'border-danger' : '' }}"
                          rows="10"
                          wire:model.live="description">
                        {{ $description }}
                    </textarea>
                <x-tt::form.error name="description" />

                <div class="prose prose-sm mt-indent-half">
                    {!! \Illuminate\Support\Str::markdown($description) !!}
                </div>
            </div>

            <div class="flex items-center space-x-indent-half">
                <button type="button" class="btn btn-outline-dark" wire:click="closeData">
                    Отмена
                </button>
                <button type="submit" form="priceBlockDataForm-{{ $block->id }}" class="btn btn-primary"
                        wire:loading.attr="disabled">
                    {{ $itemId ? "Обновить" : "Добавить" }}
                </button>
            </div>
        </form>
    </x-slot>
</x-tt::modal.dialog>
