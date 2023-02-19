<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects');
Route::post('/project/add', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::post('/project/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
Route::get('/project/delete/{id}', [App\Http\Controllers\ProjectController::class, 'delete']);
Route::get('/project/stats', [App\Http\Controllers\ProjectController::class, 'Stats'])->name('project.stats');


Route::get('/campaigns', [App\Http\Controllers\CampaignController::class, 'index'])->name('campaigns');
Route::post('/campaigns/add', [App\Http\Controllers\CampaignController::class, 'create'])->name('campaigns.create');
Route::post('/campaigns/update', [App\Http\Controllers\CampaignController::class, 'update'])->name('campaign.update');
Route::get('/campaigns/{id}', [App\Http\Controllers\CampaignController::class, 'details']);
Route::get('/campaigns/click/{id}', [App\Http\Controllers\CampaignController::class, 'Inc_clicks']);

