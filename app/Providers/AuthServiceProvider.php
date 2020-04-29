<?php

namespace App\Providers;

use App\Column;
use App\Comment;
use App\Dashboard;
use App\Policies\ColumnPolicy;
use App\Policies\CommentPolicy;
use App\Policies\DashboardPolicy;
use App\Policies\TaskPolicy;
use App\Task;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Dashboard::class => DashboardPolicy::class,
        Column::class => ColumnPolicy::class,
        Task::class => TaskPolicy::class,
        Comment::class => CommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
