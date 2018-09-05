{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Remove comment'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Removing comments:') }}</h1>
    {{-- Форма предъявляется методом HTTP DELETE на веб­‑адрес: publication/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($comment, [
            'method' => 'DELETE',
            'route'  => [
                'comments.destroy',
                $comment->id,
            ]
        ])
    }}

    {{-- Выводим наименование товара --}}

    {{ $comment->content }}

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove comment'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
