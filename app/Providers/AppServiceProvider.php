<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\Post;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            // get information
            $contact = Contact::where('info_id',1)->get();
            $app_product = Product::all()->count();
            $posts = Post::all()->count();
            $app_order = Order::all()->count();
            $app_customer = Customer::all()->count();

            $view->with('app_product',$app_product)->with('posts',$posts)->with('app_customer',$app_customer)->with('app_order',$app_order)->with('contact',$contact);
        });
        Paginator::useBootstrap();
    }
}
