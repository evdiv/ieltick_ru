@component('mail::message')
Здравствуйте {{ $user->name }}!<br>
Добро пожаловать на IELTick.<br><br>

Спасибо за регистрацию на IELTick.<br><br>
Вы только что сделали первый шаг для улучшения своего балла на IELTS Speaking.<br>
Наши подготовительные экзамены доказали свою эффективность уже сотням студентов по всему миру.<br>
Мы рады, что вы тоже будете в их числе!<br>

@component('mail::button', ['url' => env('APP_URL') . '/subscriptions/'])
	Выбрать экзамен для подготовки
@endcomponent

<br>
Команда IELTick
@endcomponent
