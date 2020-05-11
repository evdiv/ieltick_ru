@component('mail::message')
Новое сообщение с сайта IELTick<br><br>

Имя отправителя: {{ $msg['name'] }}<br>
Email отправителя: {{ $msg['email'] }}<br>
Сообщение: {{ $msg['message'] }}<br>

Спасибо,<br>
Команда IELTick
@endcomponent
