<div>
    <div>{{ $item->title }}</div>
    <div>
        @if ($item->recordable->image)
            <img src="{{ route('thumb-img', ['template' => 'col-4-square', 'filename' => $item->recordable->image->file_name]) }}" alt="">
        @else
            No image
        @endif
    </div>
    <div>{{ $item->recordable->human_price }}</div>
    <div>{{ $item->recordable->human_old_price }}</div>
    <div>{{ $item->recordable->render_sign }}</div>
    <div class="prose max-w-none">
        {!! $item->markdown !!}
    </div>
</div>
