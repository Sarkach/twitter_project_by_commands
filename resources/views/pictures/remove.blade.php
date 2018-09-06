{{-- Это шаблон формы удаления картинок из БД, сверстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции name родительского шаблона будет выведен перевод фразы: Remove image --}}
@section('name', __('Remove picture'))
<center>
  <h1>{{ __('Removing picture')}}</h1>
</center>

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP DELETE на веб-адрес: images/ID, где ID - первичный ключ картинки --}}
    {{
        Form::model($picture, [
            'method' => 'DELETE',
            'route' => [
                'pictures.destroy',
                $picture->id,
            ]
        ])
    }}

    {{-- Выводим наименование картинки --}}
    <div class = "container-fluid">
      <figure class = "col-xs-12 col-sm-6 col-md-3 col-lg-1">
        <img alt = "{{ $picture->id }}" src = "{{ asset('storage/pictures/'.$picture->path) }}" class = "img-responsive img-thumbnail">
      </figure>
    </div>

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Remove picture'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
