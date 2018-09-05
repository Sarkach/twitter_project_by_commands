{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: publication --}}
@section('title', __('comments'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('comments.create'),
                __('Create comment')
            )

			}}

    </p>
<center><h1>{{ __('Updating comments') }}</h1></center>
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
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->content }}</td>
                    <td>{{ Html::secureLink(
                        route('comments.edit', $comment->id),
                        __('Edit comment')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('comments.remove', $comment->id),
                        __('Remove comment')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
