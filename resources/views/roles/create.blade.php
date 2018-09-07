{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Create product --}}
@section('access', __('Create role'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Added access rights:') }}</h1>
    {{-- Форма предъявляется методом HTTP POST на маршрут role.create --}}
    {{
        Form::model($role, [
            'method' => 'POST',
            'route'  => 'roles.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/roles/partials/form.blade.php --}}
    @include('roles.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save role'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection