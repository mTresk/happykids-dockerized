<section id="faq" class="faq pt-s pb-s">
    <div class="faq__container">
        <h2 data-watch data-watch-once class="faq__title title _fade-down">Ответы на ваши вопросы</h2>
        <div class="faq__body">
            <div data-spollers class="faq__spoilers spoilers">
                @foreach($data->faq as $item)
                    <div data-watch data-watch-once class="spoilers__item _fade-down">
                        <div data-spoller class="spoilers__header">
                            <h3 class="spoilers__title">{{ $item['question'] }}</h3>
                            <div class="spoilers__shevron">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 12.5H25M13 25V0" stroke="#B85E65" stroke-width="2"/>
                                </svg>
                            </div>
                        </div>
                        <p class="spoilers__body">
                            {{ $item['answer'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
