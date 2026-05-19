@props(["block", "isFullPage" => true])
@if ($block->items->count())
    @php
        $perCol = config("editable-price-block.perCol");
    @endphp
    @if ($block->render_title)
        <x-tt::h2 class="mb-indent-half">{{ $block->render_title }}</x-tt::h2>
    @endif

    <div class="row">
        @foreach($block->items as $index => $item)
            @switch($perCol)
                @case(3)
                    <div class="col w-1/3 mb-indent">
                        <x-eprb::types.prices.item :$item />
                    </div>
                    @break

                @case(2)
                    <div class="col w-full 2xl:w-1/2 mb-indent">
                        <x-eprb::types.prices.half-item :$item />
                    </div>
                    @break

                @default
                    <div class="col w-full mb-indent">
                        <x-eprb::types.prices.item :$item />
                    </div>
                    @break
            @endswitch
        @endforeach
    </div>
@endif
