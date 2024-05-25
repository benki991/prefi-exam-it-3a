<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'create']);
Route::get('/students/{id}', [StudentController::class, 'student']);
Route::patch('/students/{id}', [StudentController::class, 'update']);

Route::get('/students/{id}/subjects', [SubjectController::class, 'student']);
Route::post('/students/{id}/subjects', [SubjectController::class, 'student']);
Route::get('/students/{id}/subjects/{subject_id}', [SubjectController::class, 'student']);
Route::patch('/students/{id}/subjects/{subject_id}', [SubjectController::class, 'student']);
