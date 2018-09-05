{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit publication --}}
@section('title', __('Edit publication:'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<h1>{{ __('Publication edit:') }}</h1>
    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: publication/ID, где ID - первичный ключ товара --}}
    {{
        Form::model($publication, [
            'method' => 'PUT',
            'route'  => [
                'publications.update',
                $publication->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/roles/partials/form.blade.php --}}
    @include('publications.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update publication'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection