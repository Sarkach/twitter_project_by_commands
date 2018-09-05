{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова Title --}}
   <h1>{{ Form::label('content', __('Name comment:')) }}</h1>

    {{-- Поле ввода наименования товара --}}
    {{ Form::select('publication_id', $publications, ['class' => 'form-control']) }}




   <h1>{{ Form::label('content', __('Content:')) }}</h1>
    {{ Form::text('content', null, ['class' => 'form-control']) }}


   <h1>{{ Form::label('content', __('Users name:')) }}</h1>
    {{ Form::select('user_id', $users, ['class' => 'form-control']) }}
</div>
