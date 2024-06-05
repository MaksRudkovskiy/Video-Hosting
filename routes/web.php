<?php
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
Auth::routes();

Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

// Маршруты для администратора
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/videos', [AdminController::class, 'showVideos'])->name('admin.videos.index');
    Route::patch('/admin/videos/{video}/restriction', [AdminController::class, 'applyRestrictions'])->name('admin.videos.restriction');
});

// Маршруты для видеороликов
Route::get('/', [VideoController::class, 'index'])->name('home');
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
Route::post('/videos', [VideoController::class, 'store'])->middleware('auth')->name('videos.store');
Route::post('/likes', [VideoController::class, 'likes'])->middleware('auth')->name('likes');
Route::post('/dislikes', [VideoController::class, 'dislikes'])->middleware('auth')->name('dislikes');
Route::post('/videos/{video}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

// Маршруты для администратора
Route::middleware(['auth', 'admin'])->group(function () {
    // Страница администратора
    Route::get('/admin/videos', function () {
        return view('videos.admin.indexadmin');
    })->name('admin.videos.index');

    // Обновление ограничений на видеоролик
    Route::patch('/admin/videos/{video}/restriction', [AdminController::class, 'applyRestrictions'])->name('admin.videos.restriction');
});


