<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Post;
use App\Models\User;
use App\Models\Quote;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('posts.index', [
            'posts' => isset($request->cat) ? Post::filter(['cat' => $request->cat])->paginate(3)->withQueryString() : Post::orderBy('created_at', 'DESC')->paginate(6),
            'quote' => Quote::all(),
            'publishedPosts' => Post::filter(['published' => '1'])->get(),
            'cats' => Cat::all(),
            'cat' => Cat::find($request->cat) ?? 'none',
        ]);
    }

    public function show(Request $request)
    {
        return view('posts.show', [
            'post' => Post::filter(['slug' => $request->slug])->get()->first(),
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'cats' => Cat::all()
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $formFields = $request->validate([
                'title' => ['required', Rule::unique('posts', 'title'), 'max:50'],
                //'username' => ['required', Rule::exists('users', 'username')],
                //'password' => ['required', Rule::exists('users')->where('username', $request->username)->where('password', $request->password)],
                'body' => ['required', 'max:1000', Rule::unique('posts', 'body')],
                'cat' => ['required', Rule::exists('cats', 'id')->where('id', $request->cat)],
                'audio' => [Rule::prohibitedIf($request->cat != 3), 'mimes:mp3', 'file'],
                'image' => ['required', 'mimes:png,jpg,jpeg,gif,bmp', 'file']
            ]);

            //$formFields['username'] = User::filter(['username' => $request->username])->get()->first()->id;
            $formFields['username'] = Auth::user()->id;
            $formFields['slug'] = $this->slugify($formFields['title']);

            isset($request->audio) ? $formFields['audio'] = $request->audio->store('audio', 'public_uploads') : null;
            $formFields['image'] = $request->image->store('images', 'public_uploads');

            Post::create([
                'user_id' => $formFields['username'],
                'title' => $formFields['title'],
                'slug' => $formFields['slug'],
                'body' => $formFields['body'],
                'image' => $formFields['image'],
                'audio' => $formFields['cat'] == 3 ? $formFields['audio'] : 'none',
                'published' => 0,
                'cat_id' => $formFields['cat']
            ]);


            return redirect('/');
        }
        return redirect('/')->with('error', 'User not validated please sign in again');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', ['post'=> $post ]);
    }

    public function update(Request $request){
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'title' => 'required|max:50',
            'body' => 'required|max:1000'
        ]);

        $post = Post::find($request->post_id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $this->slugify($request->title);
        $post->created_at = now();

        $post->save();
        return redirect(Route('home'))->with(['message' => 'Post updated successfully']);
    }

    public function destroy(Request $request){
        $request->validate([
            'post_id' => 'required|exists:posts,id'
        ]);
        $post = Post::find($request->post_id);
       
        file_exists($post->image) ? unlink($post->image) : null;
         
        file_exists($post->audio) ? unlink($post->audio) : null;
        $post->delete();

        //Post::truncate();
        return redirect(Route('home'))->with(['message' => 'Post deleted successfully']);
    }

    function slugify($str)
    {
        $search = array('Ș', 'Ț', 'ş', 'ţ', 'Ş', 'Ţ', 'ș', 'ț', 'î', 'â', 'ă', 'Î', 'Â', 'Ă', 'ë', 'Ë');
        $replace = array('s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E');
        $str = str_ireplace($search, $replace, strtolower(trim($str)));
        $str = preg_replace('/[^\w\d\-\’\ ]/', '', $str);
        $str = str_replace(' ', '-', $str);
        return preg_replace('~/\-{2,}~', '-', $str);
    }
}
