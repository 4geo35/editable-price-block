@if ($item->recordable->price)
    <div class="flex items-end mt-indent sm:mt-indent-lg">
        <div class="text-nowrap text-h4 font-semibold">
            {{ $item->recordable->render_price }}
        </div>
        @if ($item->recordable->old_price)
            <div class="ml-indent-xs text-nowrap text-sm text-body/60 line-through">
                {{ $item->recordable->render_old_price }}
            </div>
        @endif
    </div>
@endif
