/* Маски для полей (в работе) */

// Подключение функционала "Чертогов Фрилансера"
// Подключение списка активных модулей
import {flsModules} from '../modules.js';

// Подключение модуля
import 'inputmask/dist/inputmask.min.js';

const inputMasks = document.querySelectorAll('input[name="phone"]');
if (inputMasks.length) {
    let im = new Inputmask('+7 (999) 999 9999', {showMaskOnHover: false});
    inputMasks.forEach((inputMask) => {
        im.mask(inputMask);
    });
}

// const selector = document.querySelector('input[name="phone"]');

// if (selector) {
// 	var im = new Inputmask('+7 (999) 999 9999');
// 	im.mask(selector);
// }
