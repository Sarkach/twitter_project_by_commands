{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">


    {{-- Поле ввода наименования товара --}}
    {{ Form::select('publication_id', $publications, ['class' => 'form-control']) }}

	
    {{ Form::label('path', __('Image')) }}
    {{-- Поле ввода наименования роли --}}
    {{ Form::file('path') }}
	  {{ Form::model($image,['method' => 'POST', 'files'=> true]) }}

	  
    {{ Form::select('publication_id', $publications, ['class' => 'form-control']) }}


</div>
