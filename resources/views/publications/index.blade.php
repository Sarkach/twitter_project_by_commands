{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: publication --}}
@section('title', __('publications'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('publications.create'),
                __('Create publication')
            )

			}}

    </p>
<center><h1>{{ __('Updating publications') }}</h1></center>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($publications as $publication)
                <tr>
                    <td>{{ $publication->content }}</td>
                    <td>{{ Html::secureLink(
                        route('publications.edit', $publication->id),
                        __('Edit publication')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('publications.remove', $publication->id),
                        __('Remove publication')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection