<?php

namespace App\Http\Controllers;

use App\role;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $roles = role::orderBy('access', 'ASC')->get();
        // Использовать шаблон resources/views/products/index.blade.php, где…
        return view('roles.index')->withroles($roles);
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
        $role = new role();

        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('roles.create')->withrole($role);
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
        $role = role::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['access' => $role->access])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        //
		return view('roles.edit')->withrole($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
        // Редактирование продукта в БД.

        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['access']);

        // Обновляем кортеж в БД.
        $role->update($attributes);

        // Создаём всплывающее сообщение об успешном обновлении БД
        $request->session()->flash(
            'message',
            __('Updated', ['access' => $role->access])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('roles.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role, Request $request)
    {

        // Удаляем товар из БД.
        $role->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
		'message',
		__('Removed', ['access' => $role->access])
		);

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('roles.index'));

    }
	
	/**
     * Show the form for removing the specified resource.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function remove(role $role)
    {
		return view('roles.remove')->withrole($role);
        //
    }
}
