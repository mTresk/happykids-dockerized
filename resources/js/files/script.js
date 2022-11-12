// Подключение функционала "Чертогов Фрилансера"
import { isMobile } from './functions.js';
// Подключение списка активных модулей
import { flsModules } from './modules.js';

// Прелоадер
document.body.classList.add('loaded_hiding');
window.setTimeout(function () {
	document.body.classList.add('loaded');
	document.body.classList.remove('loaded_hiding');
}, 500);

// Кнопка наверх
function topButton() {
	let footer = document.querySelector('footer');
	if (footer) {
		footer.innerHTML += '<div class="topbutton"><i class="_icon-up"><span></span></i>';

		function trackScroll() {
			let scrolled = window.pageYOffset;
			let coords = document.documentElement.clientHeight;

			if (scrolled > coords) {
				goTopBtn.classList.add('_active');
			}
			if (scrolled < coords) {
				goTopBtn.classList.remove('_active');
			}
		}

		function backToTop() {
			if (window.pageYOffset > 0) {
				window.scrollBy(0, -80);
				setTimeout(backToTop, 6);
			}
		}

		let goTopBtn = document.querySelector('.topbutton');

		window.addEventListener('scroll', trackScroll);
		goTopBtn.addEventListener('click', backToTop);
	}
}
topButton();
