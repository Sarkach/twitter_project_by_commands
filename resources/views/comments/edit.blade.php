{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit publication --}}
@section('title', __('Edit comment:'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Comments edit:') }}</h1>
    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: publication/ID, где ID - первичный ключ товара --}}
    {{
        Form::model(comment, [
            'method' => 'PUT',
            'route'  => [
                'comments.update',
                $comment->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/roles/partials/form.blade.php --}}
    @include('comments.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update comment'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
