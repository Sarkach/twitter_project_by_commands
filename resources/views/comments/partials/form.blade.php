{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова Title --}}
   {{ Form::label('content', __('Name comment:')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::select('publication_id', $publications, ['class' => 'form-control']) }}<BR>




   {{ Form::label('content', __('Content:')) }}
    {{ Form::text('content', null, ['class' => 'form-control']) }}<BR>


   {{ Form::label('content', __('Users name:')) }}
    {{ Form::select('user_id', $users, ['class' => 'form-control']) }}
</div>
