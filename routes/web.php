<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventsController::class, 'index']);
Route::get('/fill', [EventsController::class, 'fill']);
Route::get('/search', [EventsController::class, 'search'])->name('search');
Route::get('/event/update/{event:id}',[EventsController::class, 'edit']);
Route::patch('/event/update/{event:id}', [EventsController::class, 'update']);
Route::get('/event/show/{event:id}', [EventsController::class, 'show']);
Route::get('/event/create/', [EventsController::class, 'create']);
Route::post('/event/create/', [EventsController::class, 'store']);