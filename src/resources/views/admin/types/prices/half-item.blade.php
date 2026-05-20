<div class="p-indent-half sm:p-indent bg-white rounded-base border border-stroke">
    @php($image = $item->recordable->image)
    <div class="row h-full">
        @if ($image)
            <div class="col w-full md:w-5/12 2xl:w-1/2 xs:h-[290px] sm:h-[330px] md:h-[260px] lg:h-[323px] mb-indent-half sm:mb-indent md:mb-0 md:order-last">
                <picture>
                    <source media="(min-width: 768px)"
                            srcset="{{ route('thumb-img', ['template' => 'half-price-record-image', 'filename' => $image->file_name]) }}">
                    <source media="(min-width: 640px)"
                            srcset="{{ route('thumb-img', ['template' => 'tablet-half-price-record-image', 'filename' => $image->file_name]) }}">
                    <img
                        class="rounded-base h-full object-cover object-center md:ml-auto"
                        src="{{ route('thumb-img', ['template' => 'mobile-half-price-record-image', 'filename' => $image->file_name]) }}"
                        alt="">
                </picture>
            </div>
        @endif
        <div class="col w-full md:w-7/12 2xl:w-1/2 flex flex-col md:order-first">
            <div class="flex-1">
                <div class="text-h4-mobile sm:text-h4 font-semibold">
                    {{ $item->title }}
                </div>
                @if ($item->recordable->description)
                    <div class="prose max-w-none prose-p:leading-6 mt-indent-half">
                        {!! $item->recordable->markdown !!}
                    </div>
                @endif
            </div>
            @include("eprb::admin.types.prices.price")
        </div>
    </div>
</div>
