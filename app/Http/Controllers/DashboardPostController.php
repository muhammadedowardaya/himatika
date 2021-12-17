<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\{Post, Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // $this->authorize('create', Post::class);
        $post = $request->all();
        // buat nama file untuk gambar
        $fileName = date("is") . '_' . $request->file('image')->getClientOriginalName();
        // buat slug
        $slug = Str::slug($request->title);
        $post['slug'] = $slug . date("s");
        // cek image
        if ($request->file('image')) {
            $post['image'] = $fileName;
            $request->file('image')->storeAs('images/posts', $fileName, 'public');
        } else {
            $post['image'] = null;
        }
        $post['user_id'] = auth()->user()->id;
        // dd($post['image']);
        Post::create($post);

        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => 'required|unique:posts',
        //     'category_id' => 'required',
        //     'body' => 'required'
        // ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['slug'] = Str::slug($request->title);

        // echo 'gebleg';
        // Post::create($validatedData);
        // session()->flash('success', 'pesan.berhasil("New Post has been added!")');
        return redirect('/dashboard/posts')->with('success', 'pesan.berhasil("Postingan baru berhasil ditambahkan!")');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        return view('dashboard.posts.edit', [
            'categories' => Category::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $attr = $request->all();
        // buat slug
        $slug = Str::slug($request->title);
        $attr['slug'] = $slug . date("s");
        $attr['user_id'] = auth()->user()->id;
        // cek image
        if ($request->file('image')) {
            $fileName = date("is") . '_' . $request->file('image')->getClientOriginalName();
            if ($request->oldImage) {
                Storage::delete('/images/posts/' . $request->oldImage);
            }
            $attr['image'] = $fileName;
            $request->file('image')->storeAs('images/posts', $fileName, 'public');
        } else {
            $attr['image'] = $request->oldImage;
        }
        $post->update($attr);
        return redirect('/dashboard/posts')->with('success', 'pesan.berhasil("Postingan berhasil diupdate!")');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        if ($post->image) {
            Storage::delete('/images/posts/' . $post->image);
        }
        Post::destroy($post->id);
        // echo $id;
        // return redirect('/dashboard/posts')->with('success', 'pesan.berhasil("Post has been deleted!")');
    }

    public function publish()
    {
        $data = [
            'title' => 'Posts Published',
            'posts' => Post::where('published', 1)->latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ];
        return view('dashboard.posts.approval', $data);
    }

    public function pending()
    {
        $data = [
            'title' => 'Posts Pending',
            'posts' => Post::where('published', 0)->latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ];
        return view('dashboard.posts.approval', $data);
    }


    public function approval()
    {
        $data = [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ];
        return view('dashboard.posts.approval', $data);
    }

    public function updateApproval(Request $request, Post $post)
    {
        $attr = $request->approval;
        // $attr['published'] = $request->approval;
        // $post->update($attr);
        return $attr;
    }
}