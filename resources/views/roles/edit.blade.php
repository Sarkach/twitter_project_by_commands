{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit role --}}
@section('title', __('Edit role'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Updating access rights:') }}</h1>
    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: role/ID, где ID - первичный ключ товара --}}
    {{
        Form::model($role, [
            'method' => 'PUT',
            'route'  => [
                'roles.update',
                $role->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/roles/partials/form.blade.php --}}
    @include('roles.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update role'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection