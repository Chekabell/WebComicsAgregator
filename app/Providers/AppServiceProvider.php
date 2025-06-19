<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Comics;
use App\Models\User;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-comics', function (User $user, Comics $comics){
            return $user->is_stuff || $comics->image == "covers-comics/default.jpg";
        });

        Gate::define('destroy-comment', function (User $user, Comment $comment){
            return $user->is_stuff || $user->id == $comment->user_id;
        });
    }
}
