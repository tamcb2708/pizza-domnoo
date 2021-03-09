<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Product;
use App\Model\Blog;
use App\Model\Customer;
use App\Model\Order;
use App\Model\Contact;
use App\Model\Statistical;
use App\Model\User;
use App\Model\Agent;
use App\Model\History;
use Illuminate\Support\Carbon;
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
            $appproduct=Product::all()->count();
            $appblog=Blog::all()->count();
            $appcustomer=Customer::all()->count();
            $apporder=History::all()->count();
            $appcontact=Contact::all()->count();
            $appsta=Statistical::all()->sum('total_order');
            $appstar=Statistical::all()->sum('quantity');
            $app=Statistical::all()->sum('profit');
            $appcustomer=User::all()->count();
            $appagent=Agent::all()->count();
            $view->with('appproduct',$appproduct)->with('app',$app)->with('appstar',$appstar)->with('appsta',$appsta)->with('appcustomer',$appcustomer)->with('appagent',$appagent)->with('appsta',$appsta)->with('appblog',$appblog)->with('appcustomer',$appcustomer)->with('apporder',$apporder)->with('appcontact',$appcontact);

        });
    }
}
