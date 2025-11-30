<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/tentang-saya', [PortfolioController::class, 'about'])->name('about');
Route::get('/keahlian', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/proyek', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/pendidikan', [PortfolioController::class, 'education'])->name('education');
Route::get('/sertifikasi', [PortfolioController::class, 'certificates'])->name('certificates');
Route::get('/kontak', [PortfolioController::class, 'contact'])->name('contact');
Route::post('/kontak', [PortfolioController::class, 'sendMessage'])->name('contact.send');
