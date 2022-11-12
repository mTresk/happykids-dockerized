@component('mail::message')# Пользователь оставил следующие данные:
**Имя:** {{ $formData['name'] }}

**Телефон:** {{ $formData['phone'] }}

**Возраст ребенка:** {{ $formData['age'] }}
@endcomponent
