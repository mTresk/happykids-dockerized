@component('mail::message')# Поступила оплата!
**ФИО ребенка:** {{ $transaction['description'] }}

**Телефон:** {{ $transaction['phone'] }}

**Сумма:** {{ $transaction['amount'] }} ₽
@endcomponent

