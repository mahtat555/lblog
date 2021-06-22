<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', [
            "except" => ["index", "show"]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("updated_at", "desc")->paginate(2);

        return view('posts.index', ["posts" => $posts]);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle image upload
        if ($request->hasFile("cover_image")) {
            $imageNameToStore = time() . "_"
                . $request->file("cover_image")->getClientOriginalName();

            // Upload image
            $request->file("cover_image")->storeAs(
                "public/cover_images",
                $imageNameToStore
            );
        } else {
            $imageNameToStore = "default_cover_image.jpg";
        }

        // Saving data
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->cover_image = $imageNameToStore;
        $post->save();

        return redirect(route("posts.index"))->with("success", "Post Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // check for the correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect(
                route("posts.index")
            )->with("error", "EDIT: Unauthorized Page");
        }

        return view('posts.edit', ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // check for the correct user
        $post = Post::find($id);
        if (auth()->user()->id !== $post->user_id) {
            return redirect(
                route("posts.index")
            )->with("error", "UPDATE: Unauthorized Page");
        }

        // Handle image upload
        if ($request->hasFile("cover_image")) {
            // Delete image
            if ($post->cover_image !== "default_image.jpg") {
                Storage::delete("public/cover_images/" . $post->cover_image);
            }

            $imageNameToStore = time() . "_"
                . $request->file("cover_image")->getClientOriginalName();
            $post->cover_image = $imageNameToStore;

            // Upload image
            $request->file("cover_image")->storeAs(
                "public/cover_images",
                $imageNameToStore
            );
        }

        // Saving data
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->save();

        return redirect(route("posts.index"))->with("success", "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // check for the correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect(
                route("posts.index")
            )->with("error", "DELETE: Unauthorized Page");
        }

        // Delete cover image
        if ($post->cover_image !== "default_cover_image.jpg") {
            Storage::delete("public/cover_images/" . $post->cover_image);
        }

        // Delete the post from database
        $post->delete();

        return redirect(route("posts.index"))->with("success", "Post Removed");
    }
}
