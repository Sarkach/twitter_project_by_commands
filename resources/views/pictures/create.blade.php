{{-- Это шаблон формы добавления роли в БД, сверстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Create picture --}}
@section('name', __('Create picture'))

  <h1>{{ __('Creating picture:') }}</h1>


{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма преъявляется методом HTTP POST на маршрут pictures.create --}}
    {{
        Form::model($picture, [
            'method' => 'POST',
            'route' => 'pictures.store',
            'files' => true
        ])
    }}

    <div class="form-group">
        {{-- Метка к полю ввода изображения --}}
        {{-- На метке будет выведен перевод слова Image --}}
		{{ Form::select('publication_id', $publications, ['class' => 'form-control']) }}<BR>
        {{ Form::label('path', __('Picture')) }}
    
        {{-- Поле ввода наименования роли --}}
        {{ Form::file('path', null,
          [
            'aria-describedly' => 'file-help',
            'class' => 'btn-block'
          ]) }}

        <small id = "file-help" class = "form-text text-muted">
          {{ __('Valid formats: GIF, JPEG, PNG, SVG.') }}
    </div>

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Save picture'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
