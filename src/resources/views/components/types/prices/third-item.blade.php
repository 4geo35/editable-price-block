@props(["item"])
@php($image = $item->recordable->image)
<div class="h-full p-indent-half sm:p-indent bg-white rounded-base border border-stroke">
    <div class="flex flex-col h-full">
        @if ($image)
            <div class="xs:h-[230px] sm:h-[262px] md:h-[345px] lg:h-[216px] xl:h-[174px] 2xl:h-[220px] mb-indent-half sm:mb-indent">
                <picture>
                    <source media="(min-width: 1024px)"
                            srcset="{{ route('thumb-img', ['template' => 'third-price-record-image', 'filename' => $image->file_name]) }}">
                    <source media="(min-width: 640px)"
                            srcset="{{ route('thumb-img', ['template' => 'tablet-third-price-record-image', 'filename' => $image->file_name]) }}">
                    <img
                        class="rounded-base h-full object-cover object-center"
                        src="{{ route('thumb-img', ['template' => 'mobile-third-price-record-image', 'filename' => $image->file_name]) }}"
                        alt="">
                </picture>
            </div>
        @endif

        <div class="flex-1">
            <div class="text-xl sm:text-2xl 2xl:text-3xl font-semibold">
                {{ $item->title }}
            </div>
            @if ($item->recordable->description)
                <div class="prose max-w-none prose-p:leading-6 mt-indent-half">
                    {!! $item->recordable->markdown !!}
                </div>
            @endif
        </div>

        @include("eprb::web.types.prices.includes.price")
    </div>
</div>
