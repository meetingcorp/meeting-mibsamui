<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('home.index');
// web mib

Route::get('/service', function () {
    $service = App\Models\Services::where('publish', '=', 1)->orderBy('sort', 'asc')->get();
    return view('client.mib.service', compact('service'));
})->name('service');

Route::get('/project', function () {
    $project = App\Models\Project::where('publish', '=', 1)->orderBy('sort', 'asc')->get();
    return view('client.mib.project', compact('project'));
})->name('project');

Route::get('/project/{id}', function ($id) {
    $project = App\Models\Project::whereId($id)->first();
    $all = App\Models\Project::where('publish', '=', 1)->orderBy('created_at', 'desc')->skip(0)->take(6)->get();
    return view('client.mib.showproject', compact('project', 'all'));
})->name('project.show');

Route::get('/contact', function () {
    return view('client.mib.contact');
})->name('contact');

Route::post('/notify', [App\Http\Controllers\Client\HomeController::class, 'linenotify'])->name('notify');

// end web mib

// Route::resource('/', HomeController::class);
// Route::get('/news/{news}', [HomeController::class, 'shownews'])->name('news');
// Route::get('/news', [HomeController::class, 'newsall'])->name('news.all');

// Route::get('/product/{product}', [HomeController::class, 'showproduct'])->name('product');
// Route::get('/product', [HomeController::class, 'productall'])->name('product.all');


Route::get('/login', function () {
    return view('auth.login');
});

// Auth::routes();
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginform']);
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


//admin only
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['is_admin']], function () {

        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
        Route::resource('/setting', App\Http\Controllers\Admin\SettingController::class);
        Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class);
        Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class);

        Route::resource('/news', App\Http\Controllers\Admin\NewsController::class);
        Route::get('/news/publish/{id}', [App\Http\Controllers\Admin\NewsController::class, 'publish']);
        Route::get('/news/sort/{id}', [App\Http\Controllers\Admin\NewsController::class, 'sort']);

        Route::resource('/product', App\Http\Controllers\Admin\ProductController::class);
        Route::get('/product/publish/{id}', [App\Http\Controllers\Admin\ProductController::class, 'publish']);
        Route::get('/product/sort/{id}', [App\Http\Controllers\Admin\ProductController::class, 'sort']);

        Route::resource('/category', App\Http\Controllers\Admin\ProductcateController::class);
        Route::get('/category/publish/{id}', [App\Http\Controllers\Admin\ProductcateController::class, 'publish']);
        Route::get('/category/sort/{id}', [App\Http\Controllers\Admin\ProductcateController::class, 'sort']);

        Route::resource('/banner', App\Http\Controllers\Admin\BannerController::class);
        Route::get('/banner/publish/{id}', [App\Http\Controllers\Admin\BannerController::class, 'publish']);
        Route::get('/banner/sort/{id}', [App\Http\Controllers\Admin\BannerController::class, 'sort']);

        Route::resource('/profile', App\Http\Controllers\Admin\ProfileController::class)->only(['show', 'update']);

        Route::resource('/project', App\Http\Controllers\Admin\ProjectController::class)->except(['show']);
        Route::get('/project/publish/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'publish']);
        Route::get('/project/sort/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'sort']);
        Route::post('/project/uploadimage', [App\Http\Controllers\Admin\ProjectController::class, 'uploadimage'])->name('uploadimg');
        Route::post('/project/deleteimage', [App\Http\Controllers\Admin\ProjectController::class, 'deleteupload'])->name('delimg');
		
		Route::resource('/service', App\Http\Controllers\Admin\ServiceController::class);
        Route::get('/service/publish/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'publish']);
        Route::get('/service/sort/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'sort']);
    });
});

Route::get('/storage_link', function () {
    Artisan::call('storage:link');
});

// Route::get('/coo',function () {
//     Artisan::call('make:seeder UserTableSeeder');
// });

// Route::get('/dbseed',function () {
//     Artisan::call('db:seed');
// });
