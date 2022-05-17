<?php



use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('', function () {


    return view('welcome');
});
Route::get('students', [UserController::class, 'index']);
Route::get('add', [UserController::class, 'create']);
Route::post('signup', [UserController::class, 'store']);
Route::get('login', [UserController::class, 'loginview'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('signup', [UserController::class, 'signup']);
Route::get('logout', [UserController::class, 'logout']);

Route::middleware('auth', 'isadmin')->group(
    function () {
        Route::get('admindashboard', [UserController::class, 'admindashboard'])->name('Admin.admindashboard');
         Route::get('userview', [UserController::class, 'userview'])->name('Admin.userview');
         
            Route::get('edituser/{id}', [UserController::class, 'edituser'])->name('Admin.edituser');
            Route::post('update/{id}', [UserController::class, 'updateuser'])->name('Admin.edituser');
            Route::get('delete/{id}', [UserController::class, 'deleteuser'])->name('Admin.user');
            Route::get('profile/', [UserController::class, 'adminprofile'])->name('Admin.adminprofile');
            Route::get('profileupdate/', [UserController::class, 'profileupdate'])->name('Admin.profileupdate');
            Route::post('update/', [UserController::class, 'profileupdate1'])->name('Admin.profileupdate');
             Route::post('changepassword/', [UserController::class, 'changepassword'])->name('Admin.changepassoword');
                     Route::get('changepassword/', [UserController::class, 'changepass'])->name('Admin.changepassoword');
              
               
    }
);
Route::middleware('auth', 'isuser')->group(
    function () {
        Route::get('userdashboard', [UserController::class, 'userdashboard'])->name('User.userdashboard');
        Route::get('userprofile/', [UserController::class, 'userprofile'])->name('User.userprofile');
                 Route::get('userprofileupdate/', [UserController::class, 'userprofileupdate'])->name('User.profileupdate');
            Route::post('userupdate/', [UserController::class, 'userprofileupdate1'])->name('User.profileupdate');
    }
);
