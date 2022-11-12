<section id="photo" class="photo pt pb">
    <div class="photo__container">
        <h2 data-watch data-watch-once class="photo__title title _fade-down">Наши будни</h2>
        <div class="photo__navigation">
            <div class="swiper-button-prev">
                <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.3684 20L12 18.3684L3.63158 10L12 1.63158L10.3684 4.76837e-07L0.421054 10L10.3684 20Z"
                        fill="white"/>
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.63158 0L0 1.63158L8.36842 10L0 18.3684L1.63158 20L11.5789 10L1.63158 0Z"
                          fill="#B85E65"/>
                </svg>
            </div>
        </div>
        <div data-watch data-watch-once class="photo__body _fade-down">
            <div class="photo__slider swiper">
                <div data-gallery class="photo__wrapper swiper-wrapper">
                    @foreach($data->getMedia('slides') as $slide)
                        <a href="{{ $slide->getUrl() }}" class="photo__slide swiper-slide">
                            <div class="photo__image photo__image-ibg">
                                <picture>
                                    <source srcset="{{ $slide->getUrl('webp') }}" type="image/webp">
                                    <img loading="lazy" src="{{ $slide->getUrl('cropped') }}" alt=""/></picture>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="photo__pagination swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
