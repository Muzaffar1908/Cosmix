<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactInfo;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend  pages  start
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');


// Frontend  pages  end

// Backend  pages  start
Route::prefix('admin')->name('admin.')->group(function(){
      Route::get('/', function(){
         return  view('admin.index');
      })->name('index');

      Route::resources([
         'slider' => SliderController::class,
         'about' => AboutController::class,
         'service' => ServiceController::class,
         'feature' => FeatureController::class,
         'portfolio' => PortfolioController::class,
         'pricing' => PricingController::class,
         'team' => TeamController::class,
         'testimonials' => TestimonialsController::class,
         'blog' => BlogController::class,
         'client' => ClientController::class,
         'info' => InfoController::class,
         'contact' => ContactController::class,
         'media' => MediaController::class,
      ]);

      Route::post('status', [AdminController::class, 'status'])->name('status');


});
//  Backend  pages  end