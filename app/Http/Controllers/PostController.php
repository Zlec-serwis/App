<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Doer;
use App\Http\Requests\PostApplyRequest;
use App\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\User;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search', 'showCategories']]);
    }
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$posts = Post::where('active', true)->latest();
        $posts = Post::active()->latest();
        $users = Doer::Latest();

        if ($request->city) {
            $posts = $posts->where('address_id', '=', $request->city)
                ->where('active', true);

            $users = $users->where('address_id', '=', $request->city);

//            $users = $users->whereHas('doerRelation', function($doers) use($request) {
//                $doers->where('address_id', $request->city);
//            });
        }

        if ($request->category) {
            $posts = $posts->whereHas('categories', function ($query) use ($request) {
                $query->where('id', '=', $request->category)
                    ->where('active', true);
            });

            $users = $users->whereHas('categories', function ($query) use ($request) {
                $query->where('id', '=', $request->category);
            });

//            $users = $users->whereHas('categories', function ($query) use ($request) {
//                $query->whereHas('categories', function($categories) use($request) {
//                    $categories->where('id', $request->category);
//                });
//            });
        }

        $posts = $posts->get();
        $doers = $users->get();

        return view('posts.index', compact('posts', 'doers'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);

        $q = $request->input('search');

        $posts = Post::where('title','LIKE', '%'.$q.'%')
                        ->orWhere('body','LIKE','%'.$q.'%')
                        ->get();

        $doers = Doer::where('name','LIKE', '%'.$q.'%')
                        ->orWhere('description','LIKE','%'.$q.'%')
                        ->get();

        if(count($posts) || count($doers)  > 0){
            return view('posts.index', compact('posts', 'doers'));
        }
        else {

            return redirect('/')->with('error', 'No details found. Try to search again !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $addresses = Address::pluck('city', 'id');
        return view('posts.create', compact('categories', 'addresses'));
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
            'body' => 'required'
        ]);

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;

        $addressId = $request->input('Addresses');
        $post->address_id = $addressId;
        $post->expired_time = Carbon::now()->addDay(7);
        $post->save();

        $categoryId = $request->input('CategoryList');
        $post->categories()->attach($categoryId);



        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $offers = Offer::where('post_id', '=', $post->id)
            ->latest()->limit(6)->get();
        $doers = Doer::where('address_id', '=', $post->address_id)
                        ->latest()->limit(6)->get();

        return view('posts.show', compact('post', 'doers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id');

        if (auth()->user()->id !== $post->user_id)
        {
        return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit', compact('post', 'categories'));
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
            'body' => 'required'
        ]);

        //Create Post
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->categories()->sync($request->input('CategoryList'));
        $post->save();


        return redirect('/posts')->with('success', 'Post Updated');
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

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }

    public function applyShowForm(Post $post)
    {
        return view('posts.apply', ['post' => $post]);
    }

    public function apply(PostApplyRequest $request, Post $post)
    {
        Offer::create([
            'user_id' => $post->user_id,
            'doer_id' => auth()->user()->doerRelation->id,
            'post_id' => $post->id,
            'price' => $request->price,
            'day' => $request->day,
            'description' => $request->description,
            'accepted' => 0
        ]);

        return redirect('workboard')->with('success', 'Oferta złożona pomyślnie');
    }

    public function showOffers(Post $post)
    {
        if(auth()->user()->id !== $post->user_id)
            abort(403, 'Nie jest to Twoje zlecenie');

        return view('posts.offers', [
            'offers' => $post->offers
        ]);
    }

    public function showCategories()
    {
        $categories = Category::latest()->get();

        return view('posts.services', compact('categories'));
    }
}
