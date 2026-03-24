<div class="mx-auto w-11/12 mt-indent-half space-y-indent-half" x-collapse x-show="expanded">
    @foreach($items as $item)
        <div class="card" wire:key="our-work-block-cover-{{ $item->id }}">
            <div class="card-header">
                <div class="flex items-center justify-between">
                    @include("eb::admin.types.includes.priority-buttons")
                    @include("eb::admin.types.includes.edit-delete-buttons")
                </div>
            </div>
            <div class="card-body">
                @include("eprb::admin.types.prices.item")
                @include("eb::admin.types.includes.help-info")
            </div>
        </div>
    @endforeach
</div>
