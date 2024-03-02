<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Добавляем сообщение об ошибке во флеш-сессию
            Session::flash('error', 'Ви повинні увійти в систему, щоб переглянути цю сторінку.');
            // Перенаправляем пользователя на страницу входа
            return route('login');
        }
    }
}

