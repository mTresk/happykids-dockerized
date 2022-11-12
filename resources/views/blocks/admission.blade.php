<section class="admission pb pt" id="admission">
    <div class="admission__container">
        <h2 data-watch data-watch-once class="admission__title title _fade-down">Поступление в нашу школу
            происходит в 3 этапа. <span>Вот они:</span></h2>
        <div class="admission__body">
            @foreach($data->admission as $key => $item)
                <article data-watch data-watch-once class="admission__item item-admission _fade-down">
                    <div class="item-admission__digit">{{ $key+1 }}</div>
                    <div class="item-admission__info">
                        <h3 class="item-admission__title">{{ $item['title'] }}</h3>
                        <p class="item-admission__text">
                            {{ $item['text'] }}
                        </p>
                    </div>
                    <x-button data-popup="#popup-request" class="item-admission__button btn btn_light">
                        Записаться
                    </x-button>
                </article>
            @endforeach
        </div>
    </div>
</section>
