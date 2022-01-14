<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    const pagination = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $search = trim($request->get('search'));
         $posts = Post::Where('titulo','like','%'.$search.'%')
         ->orwhere('descripcion','like','%'.$search.'%')
         ->paginate($this::pagination);

         return view('posts.index',["search" => $search,"posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);

        $img = $request->file('file')->store('public/images');
        $url = Storage::url($img); //setea la url hacia la carpeta storage en public

        $post = New Post();
        $post->titulo = $request->title;
        $post->slug = SlugService::createSlug(Post::class,'slug',$request->title);
        $post->descripcion = $request->description;
        $post->urlimagen = $url;

        $post->save();

        return redirect()->route('post.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

            if($request->title==$post->titulo&&$request->description==$post->descripcion){
                return redirect()->route('post.edit',compact('post'))->with('infoMsj','No se ha realizado ningun cambio');
            }
        
                $post->titulo = $request->title;
                $post->slug = Str::slug($request->title);
                $post->descripcion = $request->description;
    
                $post->save();
                return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
