@extends('base')

@section('title', __('Show picture'))

@section('main')
    <div class="row">
        @include('pictures.remove')
    </div>
    <div class="row">
      <div class = "container-fluid">
        <figure class = "col-xs-12 col-sm-6 col-md-3 col-lg-1">
          <img alt = "{{ $picture->id }}" src = "{{ asset('storage/pictures/'.$picture->path) }}" class = "img-responsive img-thumbnail">
        </figure>
      </div>
    </div>
@endsection
