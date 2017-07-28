<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $parent_categories = DB::table('categories')->select('id','name','alias','parent_id','hassub')->where('parent_id',0)->get();
        $sub_categories = DB::table('categories')->select('id','name','alias','parent_id','hassub')->where('parent_id','<>',0)->get();
        $parent_categories=array_map(function($item){
            return (array) $item;
        },$parent_categories);

        $sub_categories=array_map(function($item){
            return (array) $item;
        },$sub_categories);
        view()->share('parent_categories', $parent_categories);
        view()->share('sub_categories', $sub_categories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
