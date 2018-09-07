<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Publication;
use App\User;
use App\Image;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Извлекаем из БД коллекцию товаров,
      //отсортированных по возрастанию значений атрибута title
      $pictures = picture::orderBy('path', 'ASC')->get();
    //  Использовать шаблон resources/views/products/index.blade.php, где…
      return view('pictures.index')->withpictures($pictures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Форма добавления продукта в БД.
      // Создаём в ОЗУ новый экземпляр (объект) класса Product.
      $picture = new picture();
      $pictures = picture::orderBy('path', 'ASC')->pluck('path', 'id');// выгпузка юзеров через create
      $users = user::orderBy('email', 'ASC')->pluck('email', 'id');// выгпузка юзеров через create
      $publications = publication::orderBy('content', 'ASC')->pluck('content', 'id');// выгпузка юзеров через create
      // Использовать шаблон resources/views/products/create.blade.php, в котором…
      return view('pictures.create')->withpicture($picture)->withUsers($users)->withPublications($publications);
	  


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $path=$request->file('path')->store('');
      $picture=Picture::create(['path'=>$path]);
	  $request->session()->flash(
	  'message',
		__('Created4', ['path' => $picture->path])
	  );
	  return redirect(route('pictures.index'));
	  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(picture $picture)
    {
      $pictures = picture::orderBy('path', 'ASC')->pluck('path', 'id');// выгпузка юзеров через create
      return view('pictures.edit')->withPicture($picture)->withUsers($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, picture $picture)
    {
      // Редактирование продукта в БД.

      // Принимаем из формы значения полей с name, равными title, price.
      $attributes = $request->only(['content', 'path', 'user_id']);
      // Обновляем кортеж в БД.
      $picture->update($attributes);

      // Создаём всплывающее сообщение об успешном обновлении БД
      $request->session()->flash(
          'message',
          __('Updated2', ['content' => $picture->path])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('pictures.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(picture $picture, Request $request)
    {
      // Удаляем товар из БД.
      $picture->delete();

      // Создаём всплывающее сообщение об успешном удалении из БД
      $request->session()->flash(
	  'message',
		__('Removed4', ['path' => $picture->path])
  );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('pictures.index'));
    }

	/**
     * Show the form for removing the specified resource.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function remove(picture $picture)
    {
      return view('pictures.remove')->withpicture($picture);
    }
}
