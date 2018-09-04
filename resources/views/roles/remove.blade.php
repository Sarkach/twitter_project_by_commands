{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Remove role'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Removing access rights') }}</h1>
    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: role/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($role, [
            'method' => 'DELETE',
            'route'  => [
                'roles.destroy',
                $role->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}

    {{ $role->access }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove role'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection