<section id="learning" class="learning pt-s">
    <div class="learning__container">
        <h2 data-watch data-watch-once class="learning__title title _fade-down">{{ $data->recruiting_full }}</h2>
        <x-button data-watch data-watch-once data-popup="#popup-request" class="learning__button _fade-down">
            Присоединяйтесь к нам
        </x-button>
        <div class="learning__body">
            @foreach($grades as $grade)
                <a data-watch data-watch-once href="{{route('grade', $grade->slug)}}"
                   class="learning__item item-learning _fade-down">
                    @isset($grade->badge)
                        <div class="item-learning__bage">{{ $grade->badge }}</div>
                    @endisset
                    <div class="item-learning__image item-learning__image-ibg">
                        <picture>
                            <source srcset="{{ $grade->getImageAttribute()->cropped_webp }}" type="image/webp">
                            <img src="{{ $grade->getImageAttribute()->cropped }}" alt="{{ $grade->title }}"/></picture>
                    </div>
                    <h3 class="item-learning__subtitle">{{ $grade->title }}</h3>
                </a>
            @endforeach
        </div>
        <a href="{{ route('section') }}" data-watch data-watch-once class="learning__extra title pt-s _fade-down">+
            продленка и секции</a>
    </div>
</section>
