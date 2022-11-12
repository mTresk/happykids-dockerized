@extends('layouts.main')

@section('content')
    <main class="page">
        <section class="sections-block pt pb">
            <div class="sections-block__container">
                <h1 data-watch data-watch-once class="sections-block__title title _fade-down">{{ $section->title }}</h1>
                <p data-watch data-watch-once class="sections-block__info _fade-down">{{ $section->description }}</p>
                <div class="sections-block__body">
                    <div class="sections-block__wrapper">
                        {!! $section->sections_list !!}
                        <button data-popup="#popup-request" type="button" class="sections-block__button btn btn_light">
                            Записаться
                        </button>
                    </div>

                    <div data-watch data-watch-once class="sections-block__image sections-block__image-ibg _fade-down">
                        <picture>
                            <source srcset="{{ $section->getImageAttribute()->big_webp }}" type="image/webp">
                            <img src="{{ $section->getImageAttribute()->big }}" alt="{{ $section->title }}"/></picture>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
