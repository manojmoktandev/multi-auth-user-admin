<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts =  Post::with(['author'])->whereAdminId(\Auth::guard('admin')->user()->id)->latest()->get();
        return view('admin.post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request,Post $post)
    {
        //

        //$this->authorize('create',$post);
        $data =  $request->validated();
        $data['admin_id'] = \Auth::guard('admin')->user()->id;
        $post::create($data);
        // Store the flash data
        //session()->flash('message', 'Data saved successfully.');
        //flash('Post saved successfully')->important();
        return redirect()->back()->with('alert', 'Data saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        /**
         * Access to edit post user only by checking normal compare id and post user id
         * using Guard through
         */
        // if(\Auth::guard('admin')->user()->id==$post->admin_id){
        //     return view('admin.post.edit',['post'=>$post]);
        // }

        /**
         * Access to edit post user only using policy
         * using  Policy through
         **/
            // if(\Auth::guard('admin')->user()->can('view',$post)){
            //     return view('admin.post.edit',['post'=>$post]);
            // }
            // abort(403);
        /**
         * Access to edit post use only using AdminController
         */
        $this->authorize('view',$post);
        return view('admin.post.edit',['post'=>$post]);

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
            $this->authorize('update',$post);
            $validated =  $request->validated();
            $post->update(
                [
                    'title'=>$request->title,
                    'description'=>$request->description
                ]);
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
