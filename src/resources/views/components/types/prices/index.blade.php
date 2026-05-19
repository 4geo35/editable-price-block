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
            <div class="col w-full mb-indent">
                <x-eprb::types.prices.item :$item />
            </div>
        @endforeach
    </div>
@endif
