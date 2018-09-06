@extends('base')

@section('title', __('Create pictures'))

@section('main')

{{--
    Form::model() создаёт начальный тег формуляра (<form>). Опции:
    ⁃ files разрешает передачу файлов (атрибут enctype="multipart/form-data");
    ⁃ method ⁠— метод HTTP при подаче формуляра (атрибут method="POST");
    ⁃ route ⁠— псевдоним URL (см. routes/web.php) для подачи формуляра (action).
--}}
{{
    Form::model(
        $picture, [
            'files'  => true,
            'method' => 'POST',
            'route'  => 'pictures.create',
        ]
    )
}}

    <div class="form-group">
        {{-- Подпись к виджету. --}}
        {{
            Form::label(
                'file',
                __('messages.picture.file')
            )
        }}

        {{-- Виджет для выбора локального файла. --}}
        {{
            Form::file(
                'file',
                [
                    'aria-describedby' => 'file-help',
                    'class' => 'btn-block',
                ]
            )
        }}

        <small id="file-help" class="form-text text-muted">
            {{ __('messages.picture.file.mimes') }}
        </small>
    </div>

    <div class="form-group">
        {{-- Кнопка подачи формуляра. --}}
        {{
            Form::submit(
                __('messages.pictures.new'),
                [
                    'class' => 'btn btn-block btn-primary',
                ]
            )
        }}
    </div>

{{-- Конечный тег формуляра (</form>) --}}
{{
    Form::close()
}}

@endsection
