<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Category;
use App\Tag;

class FrontendComposer extends ServiceProvider {

    protected $categoriesView;
    protected $postsView;
    protected $tagsView;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function __construct() {
        $this->categoriesView = Category::all();
        $this->postsView = Post::orderBy('id','desc')->paginate(3);
        $this->tagsView = Tag::all();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function compose(View $view) {

            $routeView = Route::current()->getName();
            $view->with('postsView', $this->postsView);
            $view->with('categoriesView', $this->categoriesView);
            $view->with('routeView', $routeView);  
            $view->with('tagsView', $this->tagsView);
    }

}
