<section id="education" class="education pt-s pb-s">
    <div class="education__container">
        <div class="education__body">
            <div class="education__info">
                <h2 data-watch data-watch-once class="education__title title _fade-down">Большое внимание мы
                    уделяем развитию:</h2>
                <ul class="education__list">
                    @foreach($data->education as $item)
                        <li data-watch data-watch-once class="education__item _fade-down">{{ $item['item'] }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="education__image">
                <picture>
                    <source srcset="{{ asset('img/kid-3.webp') }}" type="image/webp">
                    <img src="{{ asset('img/kid-3.png') }}" alt="Девочка в очках"/></picture>
            </div>
        </div>
    </div>
</section>
