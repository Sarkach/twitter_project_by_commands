<?php

namespace App\Http\Controllers;

use App\publication;
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

        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('publications.create')->withpublication($publication);

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
        $attributes = $request->only(['access', 'access']);

        // Создаём кортеж в БД.
        $publication = publication::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['access' => $publication->access])
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
		return view('publications.edit')->withpublication($publication);
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
        $attributes = $request->only(['access', 'price']);

        // Обновляем кортеж в БД.
        $publication->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['access' => $publication->access])
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
    public function destroy(publication $publication)
    {
        // Удаляем товар из БД.
        $publication->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
		'message',
		__('Removed', ['access' => $publication->access])
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
