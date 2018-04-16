<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class FrontendComposer extends ServiceProvider {

    protected $categories;
    protected $posts;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot() {
        $this->categories = Category::getAll();
        $this->posts = Post::getAll();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        View::composer('*', function ($view) {
            $route = Route::current()->getName();
            $role = User::getUserRole(Auth::user());
            $view->with('posts', $this->posts);
            $view->with('categories', $this->categories);
            $view->with('route', $route);
            $view->with('role', $role);
        });
    }

}
