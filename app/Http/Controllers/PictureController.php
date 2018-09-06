<?php

namespace App\Http\Controllers;

use App\picture;
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
      // Извлекаем из БД коллекцию товаров,
      // отсортированных по возрастанию значений атрибута title
      //$pictures = picture::orderBy('content', 'ASC')->get();
      // Использовать шаблон resources/views/products/index.blade.php, где…
      //return view('picture.index')->withcomments($pictures);
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
      //$picture = new picture();
      //$users = user::orderBy('email', 'ASC')->pluck('email', 'id');// выгпузка юзеров через create
      //$publications = publication::orderBy('content', 'ASC')->pluck('content', 'id');// выгпузка юзеров через create
      // Использовать шаблон resources/views/products/create.blade.php, в котором…
      return view('comments.create')->withcomment($comment)->withUsers($users)->withPublications($publications);
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
	 $image=Image::create(['path'=>$path]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(picture $picture)
    {
        //
    }
	
	/**
     * Show the form for removing the specified resource.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function remove(picture $picture)
    {
        //
    }
}
