<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\frontend\MenuController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\ChefController;
use App\Http\Controllers\backend\MealController;
use App\Http\Controllers\TableController;
use App\Models\User;

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

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'Login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::get('/register', [AdminController::class, 'Register'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'adminRegister'])->name('admin.register.create');
    route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');


});
route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');
    route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    route::get('/admin/profile/edit', [AdminController::class, 'EditProfile'])->name('admin.edit_profile');
    route::post('/admin/profile/save', [AdminController::class, 'SaveProfile'])->name('admin.profile.store');
    route::get('/admin/change/password', [AdminController::class, 'ChangePassword'])->name('admin.change.password');
    route::post('/admin/save/password', [AdminController::class, 'SavePassword'])->name('admin.update.password');

    Route::prefix('subCategory')->group(function () {
        route::get('/view', [SubCategoryController::class, 'Index'])->name('all.subcategory');
        route::post('/store', [SubCategoryController::class, 'subcategoryStore'])->name('subcategory.store');
        route::get('/delete', [SubCategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');
        route::get('/edit/{id}', [SubCategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
        route::post('/update', [SubCategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');
        route::get('/delete/{id}', [SubCategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');
        route::get('/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']);

    });


    /* Admin Meals Routes */

    Route::prefix('meal')->group(function () {
        route::get('/view', [MealController::class, 'Index'])->name('all.meals');
        route::get('/add', [MealController::class, 'AddMeal'])->name('add.meals');
        route::post('/store', [MealController::class, 'StoreMeal'])->name('meal.store');
        route::get('/edit/{id}', [MealController::class, 'mealEdit'])->name('meal.edit');
        route::post('/update', [MealController::class, 'mealUpdate'])->name('meal.update');
        route::post('/update/image', [MealController::class, 'ThambnailImageUpdate'])->name('update.meal.thambnail');
        route::post('/update/multiImg', [MealController::class, 'multiImgUpdate'])->name('update.meal.image');
        route::get('/delete/{id}', [MealController::class, 'MealDelete'])->name('meal.delete');
        route::get('/inactive/{id}', [MealController::class, 'mealInactive'])->name('meal.inactive');
        route::get('/active/{id}', [MealController::class, 'mealActive'])->name('meal.active');
    });

    /* Admin Chefs Routes */

    Route::prefix('chef')->group(function () {
        route::get('/view', [ChefController::class, 'Index'])->name('all.chefs');
        route::get('/add', [ChefController::class, 'AddChef'])->name('add.chefs');
        route::post('/store', [ChefController::class, 'chefStore'])->name('chef.store');
        route::get('/edit/{id}', [ChefController::class, 'chefEdit'])->name('chef.edit');
        route::post('/update', [ChefController::class, 'chefUpdate'])->name('chef.update');
        route::get('/delete/{id}', [ChefController::class, 'chefDelete'])->name('chef.delete');
    });


    /* Admin Category Routes */

    Route::prefix('category')->group(function () {
        route::get('/view', [CategoryController::class, 'Index'])->name('all.category');
        route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        route::get('/delete', [CategoryController::class, 'categoryDelete'])->name('category.delete');
        route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        route::post('/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

    });


    Route::prefix('table')->group(function () {
        route::get('/view', [TableController::class, 'Index'])->name('all.tables');
        route::get('/add', [TableController::class, 'AddTable'])->name('add.tables');
        route::post('/store', [TableController::class, 'tableStore'])->name('table.store');
        route::get('/edit/{id}', [TableController::class, 'tableEdit'])->name('table.edit');
        route::post('/update', [TableController::class, 'tableUpdate'])->name('table.update');
        route::get('/delete/{id}', [TableController::class, 'tableDelete'])->name('table.delete');
    });

    route::get('/booking/view', [BookingController::class, 'Index'])->name('all.bookings');
});

/////////// frontend Routes

route::get('/language/english', [LanguageController::class, 'English'])->name('english');
route::get('/language/arabic', [LanguageController::class, 'Arabic'])->name('arabic');
route::get('/menu', [MenuController::class, 'Index'])->name('menu');
route::get('/booking', [IndexController::class, 'BookingPage'])->name('booking');



route::group(['prefix'=> 'booking', 'middleware' => ['user', 'auth'] , 'namespace' => 'user'] , function(){
    route::post('/data/store/{id}', [BookingController::class, 'BookTable']);
    route::get('/tables', [BookingController::class, 'TablesAvailable'])->name('tables');
    route::get('/all-tables', [BookingController::class, 'GetTables']);
    route::get('/Table/view/modal/{id}', [BookingController::class, 'showModal']);
    route::get('/delete/{id}', [BookingController::class, 'bookingDelete'])->name('booking.delete');
    route::get('/notify', [BookingController::class, 'notify']);
    route::get('/read/{id}', [BookingController::class, 'markAsRead'])->name('read');
});


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->middleware(['auth'])->name('dashboard');
route::get('/logout', [IndexController::class, 'userLogout'])->name('user.logout');
route::get('/profile', [IndexController::class, 'userProfile'])->name('user.profile');
route::post('/profile/update', [IndexController::class, 'updateProfile'])->name('user.update.profile');
route::get('/user/password', [IndexController::class, 'updatePassword'])->name('user.password');
route::post('/user/password', [IndexController::class, 'savePassword'])->name('user.update.password');

require __DIR__.'/auth.php';


