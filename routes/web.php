<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// List students
Route::get('/students', function () {
    return view('students');
});

// Create form
Route::get('/students/create', function () {
    return view('create_student');
});

// Create student
Route::post('/students/create', function (Request $request) {
    $api = Request::create('/api/students', 'POST', $request->all());
    Route::dispatch($api);

    return redirect('/students')->with('success', 'Student created!');
});

// Edit form
Route::get('/students/{id}/edit', function ($id) {
    $api = Request::create("/api/students/$id", 'GET');
    $response = Route::dispatch($api);
    $student = $response->getData()->data;

    return view('edit_student', ['student' => $student]);
});

// Update student
Route::post('/students/{id}/edit', function (Request $request, $id) {
    $api = Request::create("/api/students/$id", 'PUT', $request->all());
    Route::dispatch($api);

    return redirect('/students')->with('success', 'Student updated!');
});

// Delete student
Route::get('/students/{id}/delete', function ($id) {
    $api = Request::create("/api/students/$id", 'DELETE');
    Route::dispatch($api);

    return redirect('/students')->with('success', 'Student deleted!');
});