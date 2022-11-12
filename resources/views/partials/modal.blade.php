<div id="popup-request" aria-hidden="true" class="popup">
	<div class="popup__wrapper">
		<div class="popup__content">
			<button data-close type="button" class="popup__close">X</button>
			<form data-test data-ajax data-dev method="POST" data-popup-message="#request"
				action="{{ route('contact') }}" class="popup__form form">
				@csrf
				<input id="request-popup" name="check" type="hidden" value="" />
				<input type="text" name="human" value="" style="position: absolute; left: -9999px; display: none;">
				<div class="form__title title">Оставьте заявку на консультацию</div>
				<div class="form__description">Мы свяжемся с вами и подберем удобное время встречи</div>
				<div class="form__input">
					<input autocomplete="off" type="text" name="name" data-required data-error="Введите имя"
						placeholder="Ваше имя" class="input" />
				</div>
				<div class="form__input">
					<input autocomplete="off" type="text" name="phone" data-required data-error="Введите телефон"
						placeholder="Ваш телефон" class="input" />
				</div>
				<div class="form__input">
					<input autocomplete="off" type="number" name="age" data-required data-error="Введите возраст"
						placeholder="Возраст ребенка" class="input" />
				</div>

				<button onclick="document.getElementById('request-popup').value = 'only-human';" type="submit"
					class="form__btn btn">Оставить заявку
				</button>
				<p class="form__accept">
					Нажимая на кнопку я принимаю условия <a href="{{ route('policy') }}"
						target="_blank">пользовательского
						соглашения</a> и даю согласие на обработку персональных данных
				</p>
			</form>
		</div>

	</div>
</div>
<div id="popup-payment" aria-hidden="true" class="popup">
	<div class="popup__wrapper">
		<div class="popup__content">
			<button data-close type="button" class="popup__close">X</button>
			<form method="POST" action="{{ route('payment.create') }}" class="popup__form form">
				@csrf
				<div class="form__title title">Оплата за обучение в «Школе»</div>
				<div class="form__input">
					<input autocomplete="off" type="number" name="amount" data-required data-error="Введите сумму"
						placeholder="Сумма платежа в рублях" class="input" />
				</div>
				<div class="form__input">
					<input autocomplete="off" type="text" name="name" data-required data-error="Введите ФИО ребенка"
						placeholder="ФИО ребенка" class="input" />
				</div>
				<div class="form__input">
					<input autocomplete="off" type="text" name="phone" data-required data-error="Введите телефон"
						placeholder="Ваш телефон" class="input" />
				</div>
				<button type="submit" class="form__btn btn">Перейти к оплате</button>
				<p class="form__accept">
					Нажимая на кнопку я принимаю условия <a href="{{ route('policy') }}"
						target="_blank">пользовательского
						соглашения</a> и даю согласие на обработку персональных данных
				</p>
			</form>
		</div>
	</div>
</div>
<div class="popup" aria-hidden="true" id="request">
	<div class="popup__wrapper">
		<div class="popup__content">
			<div class="popup__body thanks">
				<div class="thanks__title title">Спасибо!</div>
				<div class="thanks__text">Скоро мы свяжемся с вами.</div>
				<button data-close type="button" class="popup__close">X</button>
			</div>
		</div>
	</div>
</div>