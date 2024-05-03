<?php

use App\Livewire\Counter;
use App\Livewire\CreatePost;
use App\Livewire\CreateProgramAccount;
use App\Livewire\EditProfile;
use App\Livewire\HelloWorld;
use App\Livewire\Order\Index\Page;
use App\Livewire\ProgramAccount;
use App\Livewire\ShowPosts;
use App\Livewire\Signup;
use App\Livewire\Todos;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', ProgramAccount::class);
Route::get('/counter', Counter::class);
Route::get('/hello-world', HelloWorld::class);
Route::get('/posts', ShowPosts::class);
Route::get('/create-post', CreatePost::class);
Route::get('/edit-profile', EditProfile::class);
Route::get('/signup', Signup::class);

Route::get('/store/{store}/orders', Page::class);
    //->middleware('can:view,store');

Route::get('/program-account', ProgramAccount::class)
    ->name('programs.index');
Route::get('/program-account/create', CreateProgramAccount::class)
    ->name('programs.create');
