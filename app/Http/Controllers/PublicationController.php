<?php

namespace App\Http\Controllers;

use App\Publication;
use App\User;
use Illuminate\Http\Request;

class PublicationController extends Controller
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
        $publications = publication::orderBy('content', 'ASC')->get();
        // Использовать шаблон resources/views/products/index.blade.php, где…
        return view('publications.index')->withpublications($publications);
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
        $publication = new publication();
		$users = user::orderBy('email', 'ASC')->pluck('email', 'id');// выгпузка юзеров через create
        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('publications.create')->withPublication($publication)->withUsers($users);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Добавление продукта в БД
        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['content', 'status', 'user_id']);

		if (isset($attributes['status']))
			$attributes['status']=true;
		else
			$attributes['status']=false;
        // Создаём кортеж в БД.
        $publication = publication::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created2', ['content' => $publication->content])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('publications.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(publication $publication)
    {
		//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(publication $publication)
    {
        //
		$users = user::orderBy('email', 'ASC')->pluck('email', 'id');// выгпузка юзеров через create
		return view('publications.edit')->withPublication($publication)->withUsers($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, publication $publication)
    {
        // Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['content', 'status', 'user_id']);
        // Обновляем кортеж в БД.
        $publication->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated2', ['content' => $publication->content])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('publications.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(publication $publication, Request $request)
    {
        // Удаляем товар из БД.
        $publication->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
		'message',
		__('Removed2', ['content' => $publication->content])
		);

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('publications.index'));
    }
	
	/**
     * Show the form for removing the specified resource.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function remove(publication $publication)
    {
		return view('publications.remove')->withpublication($publication);
        //
    }
}
