<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index()
    {
        return redirect()->route('photo.create');
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
    }

    public function show(Photo $photo)
    {
    }

    public function edit(Photo $photo)
    {
    }

    public function update(Request $request, Photo $photo)
    {
    }

    public function destroy(Photo $photo)
    {
    }
}
