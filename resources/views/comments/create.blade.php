{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Create product --}}
@section('access', __('Create comment'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Create comments:') }}</h1>
    {{-- Форма предъявляется методом HTTP POST на маршрут comment.create --}}
    {{
        Form::model($comment, [
            'method' => 'POST',
            'route'  => 'comments.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/publications/partials/form.blade.php --}}
    @include('comments.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save comment'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
