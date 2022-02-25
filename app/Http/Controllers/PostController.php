<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Translation;
use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('translation')->get();

        return  view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new  Post();
        $post->status = $request->status ?? false;
        $post->save();

        $post->translations()->createMany($request->translation);
        session()->put('locale', 'vi');
        return redirect()->route('posts.index');
    }

    public function changeLocale($locale){
        session()->put('locale', $locale);
        $slug = str_replace(url(''), '', url()->previous());
//        $data = DB::table('translations')->where('slug',ltrim($slug, "/"))->first();
//        if($data !== null){
//              $newdata = DB::table('translations')->where('post_id',$data->post_id)->where('locale',$locale)->first();
//
//            return redirect("/$newdata->slug");
//        }
//        else{
//            return redirect()->back();
//        }

        return redirect()->back();
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
    public function update(Request $request, $id)
    {
        //
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

    public function postdetail($slug){
        // $posts = Post::with('translation')->where('slug',$slug)->firstorfail();
        // $posts = Post::with('translation')->firstorfail();
//        $post = DB::table('translations')->where('slug',$slug)->First();
        $translation = Translation::with('post')->whereSlug($slug)->FirstOrFail();

        if($translation->locale != session('locale')){
            session()->put('locale', $translation->locale);
            $translation  = $translation->post->translation;
        }

        return redirect()->route('post.detail', $translation->slug);

        // dd($post);
        //return view('post.detail',compact('post'));
    }
}
