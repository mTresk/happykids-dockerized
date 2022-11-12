window.onload = function () {
	const map = document.querySelector('#map');

	let options_map = {
		once: true, //запуск один раз, и удаление наблюдателя сразу
		passive: true,
		capture: true,
	};

	if (map) {
		map.addEventListener('click', start_lazy_map, options_map);
		map.addEventListener('mouseover', start_lazy_map, options_map);
		map.addEventListener('touchstart', start_lazy_map, options_map);
		map.addEventListener('touchmove', start_lazy_map, options_map);
	}

	let map_loaded = false;
	function start_lazy_map() {
		if (!map_loaded) {
            let map_block = document.getElementById('ymap_lazy');
            map_loaded = true;
            map_block.setAttribute('src', map_block.getAttribute('data-src'));
            map_block.removeAttribute('data-src');
			setTimeout(() => {
				if (map) {
					function mapInit() {
						ymaps.ready(init);
						function init() {
							// Создание карты.
							var myMap = new ymaps.Map('map', {
								// Координаты центра карты.
								// Порядок по умолчанию: «широта, долгота».
								// Чтобы не определять координаты центра карты вручную,
								// воспользуйтесь инструментом Определение координат.
								controls: [],
								center: [57.129015567550006, 65.54168499999996],
								// Уровень масштабирования. Допустимые значения:
								// от 0 (весь мир) до 19.
								zoom: 16,
							});

							let myPlacemark = new ymaps.Placemark(
								[57.129015567550006, 65.54168499999996],
								{},
								{
									hasBalloon: false,
									hideIconOnBalloonOpen: false,
									// Необходимо указать данный тип макета.
									// iconLayout: 'default#imageWithContent',
									// Своё изображение иконки метки.
									// iconImageHref: 'img/icons/map.svg',
									// Размеры метки.
									// iconImageSize: [46, 32],
									// Смещение левого верхнего угла иконки относительно
									// её "ножки" (точки привязки).
									// iconImageOffset: [-20, -15],
									// Смещение слоя с содержимым относительно слоя с картинкой.
									iconContentOffset: [0, 0],
								}
							);
							myMap.geoObjects.add(myPlacemark);

							// myMap.behaviors.disable('drag');
							myMap.controls.remove('geolocationControl'); // удаляем геолокацию
							myMap.controls.remove('searchControl'); // удаляем поиск
							myMap.controls.remove('trafficControl'); // удаляем контроль трафика
							myMap.controls.remove('typeSelector'); // удаляем тип
							myMap.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
							myMap.controls.remove('rulerControl'); // удаляем контрол правил
							myMap.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
						}
					}

					mapInit();
				}
			}, 2000);
		}
	}
};
