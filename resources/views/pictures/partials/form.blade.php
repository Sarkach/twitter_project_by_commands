{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования роли --}}
    {{-- На метке будет выведен перевод слова Name --}}
    {{ Form::label('path', __('Image')) }}

    {{-- Поле ввода наименования роли --}}
    {{ Form::file('path') }}
	{{ Form::model($image,['method' => 'POST', 'files'=> true]) }}
</div>
