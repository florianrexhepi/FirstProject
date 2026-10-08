<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Assignment: Routing, Requests & Responses

// Detyra 1

Route::get('/courses', function () {
    return '<h1>Available Courses</h1>';
})->name('courses');

Route::get('/home', function () {
    return '<a href="' . route('courses') . '">Courses</a>';
});


// Detyra 2

Route::get('/courses/{id}', function ($id) {
    return 'Course ' . $id;
})->whereNumber('id');

Route::get('/courses/{id}/{title}', function ($id, $title) {
    return 'Course ' . $id . ': ' . $title;
})->whereNumber('id')->whereAlpha('title');

Route::get('/courses/category/{category?}', function ($category = null) {
    if ($category) {
        return 'Category: ' . $category;
    }

    return 'All categories';
});


// Detyra 3

Route::get('/courses/search', function (Request $request) {
    return response()->json([
        'keyword' => $request->query('keyword'),
        'level' => $request->input('level', 'Beginner'),
        'hasKeyword' => $request->has('keyword')
    ]);
});


// Detyra 4

Route::get('/courses/featured', function () {
    return response()
        ->json(['message' => 'Featured courses'], 200)
        ->header('X-Course-Source', 'Laravel')
        ->cookie('last_visited', 'featured');
});


// Detyra 5

Route::redirect('/catalog', '/courses');
