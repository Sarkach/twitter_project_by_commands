{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Remove publication'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Removing publication:') }}</h1>
    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: publication/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($publication, [
            'method' => 'DELETE',
            'route'  => [
                'publications.destroy',
                $publication->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}

    {{ $publication->content }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove publication'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection