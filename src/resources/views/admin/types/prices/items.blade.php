@php($perCol = config("editable-price-block.perCol"))
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
                <div class="row">
                    @switch($perCol)
                        @case(3)
                            <div class="col w-full lg:w-1/2 xl:w-1/3">
                                @include("eprb::admin.types.prices.third-item")
                            </div>
                            @break

                        @case(2)
                            <div class="col w-full 2xl:w-1/2">
                                @include("eprb::admin.types.prices.half-item")
                            </div>
                            @break

                        @default
                            <div class="col w-full">
                                @include("eprb::admin.types.prices.item")
                            </div>
                            @break
                    @endswitch
                </div>

                @include("eb::admin.types.includes.help-info")
            </div>
        </div>
    @endforeach
</div>
