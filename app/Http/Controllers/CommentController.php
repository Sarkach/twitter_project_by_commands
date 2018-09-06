<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Publication;
use Illuminate\Http\Request;

class CommentController extends Controller
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
      $comments = comment::orderBy('content', 'ASC')->get();
      // Использовать шаблон resources/views/products/index.blade.php, где…
      return view('comments.index')->withcomments($comments);
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
      $comment = new comment();
      $users = user::orderBy('email', 'ASC')->pluck('email', 'id');// выгпузка юзеров через create
      $publications = publication::orderBy('content', 'ASC')->pluck('content', 'id');// выгпузка юзеров через create
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
      // Добавление продукта в БД
      // Принимаем из формы значения полей с name, равными title, price.
      $attributes = $request->only(['publication_id', 'content', 'user_id']);

      // Создаём кортеж в БД.
      $comment = comment::create($attributes);

      // Создаём всплывающее сообщение об успешном сохранении в БД:
      // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
      // (см. resources/lang/ru/messages.php).
      $request->session()->flash(
          'message',
          __('Created3', ['content' => $comment->content])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('comments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
      //
      $users = user::orderBy('email', 'ASC')->pluck('email', 'id');// выгпузка юзеров через create
      $publications = publication::orderBy('content', 'ASC')->pluck('content', 'id');// выгпузка юзеров через create
      return view('comments.edit')->withcomment($comment)->withUsers($users)->withPublications($publications);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
      // Редактирование продукта в БД.

      // Принимаем из формы значения полей с name, равными title, price.
      $attributes = $request->only(['publication_id', 'content', 'user_id']);
      // Обновляем кортеж в БД.
      $comment->update($attributes);

      // Создаём всплывающее сообщение об успешном обновлении БД
      $request->session()->flash(
          'message',
          __('Updated3', ['content' => $comment->content])
      );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment, Request $request)
    {
      // Удаляем товар из БД.
      $comment->delete();

      // Создаём всплывающее сообщение об успешном удалении из БД
      $request->session()->flash(
     'message',
     __('Removed3', ['content' => $comment->content])
  );

      // Перенаправляем клиент HTTP на маршрут с именем products.index
      // (см. routes/web.php).
      return redirect(route('comments.index'));
    }

	/**
     * Show the form for removing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\comment
     */
    public function remove(comment $comment)
    {
      return view('comments.remove')->withcomment($comment);
          //
    }
}
