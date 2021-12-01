<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => "required|unique:categories",
            'image' => 'image|file|max:2048'
        ]);

        $slug = date('s') . '_' .  Str::slug($request->name);
        $validatedData['slug'] = $slug;

        if ($request->file('image')) {
            $fileName = $slug . '.' . $request->file('image')->getClientOriginalExtension();
            if ($request->oldImage) {
                Storage::delete('/images/categories/' . $request->oldImage);
            }
            $validatedData['image'] = $fileName;
            $request->file('image')->storeAs('images/categories', $fileName, 'public');
        }
        // dd($validatedData);
        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'pesan.berhasil("Kategori baru berhasil ditambahkan!")');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => "required|unique:categories",
            'image' => 'image|file|max:2048'
        ]);
        $slug = date('s') . Str::slug($category->name);
        $validatedData['slug'] = $slug;

        if ($request->file('image')) {
            $fileName = $slug . '.' . $request->file('image')->getClientOriginalExtension();
            if ($request->oldImage) {
                Storage::delete('/images/categories/' . $request->oldImage);
            }
            $validatedData['image'] = $fileName;
            $request->file('image')->storeAs('images/categories', $fileName, 'public');
        }
        // dd($fileName);
        $category->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'pesan.berhasil("Kategori berhasil diupdate!")');
        // echo json_encode($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUbah(Request $request)
    {
        $slug = $request->json('slug');
        $kategori = Category::where('slug', $slug)->first();
        echo json_encode($kategori->image);
    }
}