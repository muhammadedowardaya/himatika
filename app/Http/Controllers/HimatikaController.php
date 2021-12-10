<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HimatikaController extends Controller
{
    public function index()
    {
        return view('himatika.home');
    }

    public function event(Category $category)
    {
        // $category = new Category;
        $data = [
            'events' => $category->posts()->latest()->paginate(6)
        ];
        // dd($data);
        return view('himatika.event', $data);
    }
}