<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        echo view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('id', 'title');
        $post = new Post();

        echo view('dashboard.post.create', compact('category', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        /*$data = array_merge($request->all(), ['image' => '']);

        Post::create($data);*/

        Post::create($request->validated());

        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::pluck('id', 'title');

        echo view('dashboard.post.edit', compact('category', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $data['image']->move(public_path('image'), time() . '.' . $data['image']->extension());
        }

        $post->update($request->validated());
        //$request->session()->flash('status', 'Registro actualizado');
        return to_route('post.index')->with('status', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('status', 'Registro eliminado');
    }
}
