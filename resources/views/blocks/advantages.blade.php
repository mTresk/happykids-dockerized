<section id="advantages" class="advantages pt">
    <div class="advantages__container">
        <h2 data-watch data-watch-once class="advantages__title title _fade-down">
            Мы создаем среду для развития и становления уверенной, свободной, счастливой личности.
            <span>КАК?</span>
        </h2>
        <div class="advantages__body">
            @foreach($data->advantages as $item)
                <div data-watch data-watch-once class="advantages__item item-advantages _fade-down">
                    <div class="item-advantages__icon">
                        <img src="{{ url('storage/' . $item['advantages_image']) }}" alt="{{ $item['item'] }}"/>
                    </div>
                    <h3 class="item-advantages__text">{{ $item['item'] }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>
