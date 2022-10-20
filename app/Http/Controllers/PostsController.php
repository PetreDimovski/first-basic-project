<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //Daca dorim ca numai useri logati sa aiba access la aseste rute de mai jos prinse in __construct
    public function __construct()
    {

        $this->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        return view('blog.index', [
            'posts' => Post::orderBy('updated_at','desc')->paginate(20)
            ]);
    }


    public function create()
    {
        return view('blog.create');
    }


    public function store(PostFormRequest $request)
    {
        $request->validated();

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_pubslihed === 'on',
            'min_to_read' => $request->min_to_read

        ]);

        return redirect(route('blog.index'));

    }

    public function show($id)
    {
        return view('blog.show',[
            'post' => Post::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('blog.edit', [
                'post' => Post::where('id', $id)->first()
        ]);
    }

    public function update(PostFormRequest $request, $id)
    {
        $request->validated();

        Post::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));

        return  redirect(route('blog.index'));
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect(route('blog.index'))->with('message', 'Post has been deleted');
    }

    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);
    }
}
