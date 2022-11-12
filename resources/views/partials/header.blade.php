<header class="header">
    <div class="header__container">
        <div class="header__body">
            <a href="{{ route('home') }}" class="header__logo">
                <img src="{{ asset('img/icons/logo.svg') }}" alt="Логотип сайта"/>
            </a>
            <div class="header__menu menu">
                <button type="button" class="menu__icon icon-menu"><span></span></button>
                <nav class="menu__body">
                    <ul class="menu__list">
                        <li class="menu__item"><a data-goto="#about" data-goto-top="20" href="/#about"
                                                  class="menu__link">О нас</a></li>
                        <li class="menu__item"><a data-goto="#learning" data-goto-top="60" href="/#learning"
                                                  class="menu__link">Обучение</a></li>
                        <li class="menu__item"><a data-goto="#admission" data-goto-top="20" href="/#admission"
                                                  class="menu__link">Поступление</a></li>
                        <li class="menu__item"><a data-goto="#faq" data-goto-top="60" href="/#faq"
                                                  class="menu__link">Ответы на вопросы</a></li>
                        <li class="menu__item"><a data-goto="#photo" data-goto-top="20" href="/#photo"
                                                  class="menu__link">Фото</a></li>
                        <li class="menu__item"><a data-goto="#contacts" data-goto-top="80" href="/#contacts"
                                                  class="menu__link">Контакты</a></li>
                        <li class="menu__item"><a data-popup="#popup-payment" data-goto-top="80" href="#"
                                                  class="menu__link">Оплата</a></li>
                    </ul>
                </nav>
            </div>
            <div class="header__socials">
                <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone) }}" class="header__social">
                    <img src="{{ asset('img/icons/phone.svg') }}" alt=""/>
                </a>
                <a target="_blank" href="{{ $telegram }}" class="header__social">
                    <img src="{{ asset('img/icons/tg.svg') }}" alt=""/>
                </a>
                <a target="_blank" href="{{ $whatsapp }}" class="header__social">
                    <img src="{{ asset('img/icons/wa.svg') }}" alt=""/>
                </a>
                <a target="_blank" href="{{ $vk }}" class="header__social">
                    <img src="{{ asset('img/icons/vk.svg') }}" alt=""/>
                </a>
            </div>
        </div>
    </div>
</header>
