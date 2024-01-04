<?php

namespace App\Providers;


use App\Models\Setting;
use App\Repositories\UserRepository;
use App\Repositories\TrackRepository;
use App\Repositories\CourseRepository;
use App\Repositories\LessonRepository;
use Illuminate\Support\Facades\Schema;
use App\Repositories\ArticleRepository;
use App\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\TrackRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\LessonRepositoryInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(LessonRepositoryInterface::class, LessonRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(TrackRepositoryInterface::class, TrackRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            $settingRepository = app()->make(SettingRepository::class);
            $CategoryRepository = app()->make(CategoryRepository::class);
            $TrackRepository = app()->make(TrackRepository::class);

            $setting = $settingRepository->getLatest();
            $Category = $CategoryRepository->GetOrder();
            $Tracks = $TrackRepository->GetOrder();

            $view->with([
                'setting' => $setting,
                'Category' => $Category,
                'Tracks' => $Tracks,
            ]);
            
        });

    }
}
