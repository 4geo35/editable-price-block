@props(["item"])
@php($image = $item->recordable->image)
<div class="h-full p-indent-half sm:p-indent bg-white rounded-base border border-stroke">
    <div class="row h-full">
        @if ($image)
            <div class="col w-full xl:w-1/2 xs:h-[165px] sm:h-[190px] md:h-[248px] lg:h-[340px] xl:h-[212px] 2xl:h-[257px] mb-indent-half sm:mb-indent xl:mb-0 xl:order-last">
                <picture>
                    <source media="(min-width: 1280px)"
                            srcset="{{ route('thumb-img', ['template' => 'price-record-image', 'filename' => $image->file_name]) }}">
                    <source media="(min-width: 640px)"
                            srcset="{{ route('thumb-img', ['template' => 'tablet-price-record-image', 'filename' => $image->file_name]) }}">
                    <img
                        class="rounded-base h-full object-cover object-center"
                        src="{{ route('thumb-img', ['template' => 'mobile-price-record-image', 'filename' => $image->file_name]) }}"
                        alt="">
                </picture>
            </div>
        @endif
        <div class="col w-full xl:w-1/2 flex flex-col xl:order-first">
            <div class="flex-1">
                <div class="text-h3-mobile sm:text-h3 font-semibold">
                    {{ $item->title }}
                </div>
                @if ($item->recordable->description)
                    <div class="prose max-w-none prose-p:leading-6 mt-indent-half">
                        {!! $item->recordable->markdown !!}
                    </div>
                @endif
            </div>
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
        </div>
    </div>
</div>
