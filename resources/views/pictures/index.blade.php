@extends('base')

@section('title', __('Pictures'))

@section('main')

  <p>
    {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
    {{
      Html::secureLink(
        route('pictures.create'),
        __('Create picture')
      )
    }}
  </p>

    <div class="container-fluid">
        <div class="row">
        @foreach ($pictures as $picture)
          <figure class = "col-xs-12 col-sm-6 col-md-3 col-lg-1">
            <img alt = "{{ $picture->id }}" src = "{{ asset('storage/pictures/'.$picture->path) }}" class = "img-responsive img-thumbnail">
            <figcaption class = "text-center">
              {{ Html::secureLink(
                  route('pictures.remove', $picture->id),
                  __('Remove picture')
                )}}
            </figcaption>
          </figure>
        @endforeach
        </div>
    </div>
@endsection
