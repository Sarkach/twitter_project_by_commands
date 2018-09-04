{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова Title --}}
   <h1>{{ Form::label('access', __('Editing users')) }}</h1>

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('access', null, ['class' => 'form-control']) }}
</div>
