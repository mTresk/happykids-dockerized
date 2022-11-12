@extends('layouts.main')

@section('content')
    <main class="page">
        <section class="classes pt pb">
            <div class="classes__container">
                <h1 class="classes__title title">{{ $grade->title }}</h1>
                <div class="classes__info">
                    <div class="classes__label">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4062 0.083313C4.65625 0.083313 0 4.74998 0 10.5C0 16.25 4.65625 20.9166 10.4062 20.9166C16.1667 20.9166 20.8333 16.25 20.8333 10.5C20.8333 4.74998 16.1667 0.083313 10.4062 0.083313ZM10.4167 18.8333C5.8125 18.8333 2.08333 15.1041 2.08333 10.5C2.08333 5.89581 5.8125 2.16665 10.4167 2.16665C15.0208 2.16665 18.75 5.89581 18.75 10.5C18.75 15.1041 15.0208 18.8333 10.4167 18.8333ZM10.9375 5.29165H9.375V11.5416L14.8437 14.8229L15.625 13.5416L10.9375 10.7604V5.29165Z"
                                fill="#B85E65"/>
                        </svg>
                    </div>
                    <div class="classes__schedule">{{ $grade->schedule }}</div>
                </div>
                <div class="classes__body">
                    <div class="classes__wrapper">
                        {!! $grade->lesson !!}
                    </div>

                    <div class="classes__image classes__image-ibg">
                        <picture>
                            <source srcset="{{ $grade->getImageAttribute()->big_webp }}" type="image/webp">
                            <img src="{{ $grade->getImageAttribute()->big }}" alt="{{ $grade->title }}"/></picture>
                    </div>
                </div>
                @if(isset($grade->extra))
                    <p class="classes__extra pt-s">
                        {{ $grade->extra }}
                    </p>
                @endif
                <div class="classes__body classes__body_bottom pt pb-s">
                    <div class="sections">
                        <h2 class="sections__title title">Дополнительные секции</h2>
                        {!! $grade->section !!}
                    </div>
                    <div class="price">
                        <h2 class="price__title title">Стоимость</h2>
                        <div class="price__line">
                            <div class="price__tag">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.875 1.75L0.625 13L7.5 19.875L18.75 8.625V1.75H11.875ZM15 6.75C14.7528 6.75 14.5111 6.67669 14.3055 6.53934C14.1 6.40199 13.9398 6.20676 13.8452 5.97835C13.7505 5.74995 13.7258 5.49861 13.774 5.25614C13.8222 5.01366 13.9413 4.79093 14.1161 4.61612C14.2909 4.4413 14.5137 4.32225 14.7561 4.27402C14.9986 4.22579 15.2499 4.25054 15.4784 4.34515C15.7068 4.43976 15.902 4.59998 16.0393 4.80554C16.1767 5.0111 16.25 5.25277 16.25 5.5C16.25 5.83152 16.1183 6.14946 15.8839 6.38388C15.6495 6.6183 15.3315 6.75 15 6.75Z"
                                        fill="#B85E65"/>
                                </svg>
                            </div>
                            <div class="price__value">{{ $grade->price }} ₽/мес</div>
                        </div>

                        <div class="price__list">
                            {!! $grade->price_extra !!}
                        </div>
                    </div>
                </div>
                <div class="classes__buttons">
                    <x-button data-popup="#popup-request" class="classes__button btn_light">
                        Записаться
                    </x-button>
                    <x-button data-popup="#popup-payment" class="classes__button btn_light btn_pay">
                        Оплатить
                    </x-button>
                </div>
            </div>
        </section>
    </main>
@endsection
