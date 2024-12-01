<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        $articles=Article::paginate(5);

        return response()->json(new ArticleCollection($articles),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create([
            'user_id'=>auth('api')->user()->id,
           'title'=>$request->title,
           'description' =>$request->description,
            'image'=>$this->uploadImage($request)

        ]);

        return response()->json([
           'message'=>'created'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $articles=Article::FindOrFail($id);
        return response()->json([
            'data'=>new ArticleResource($articles)
        ],200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article=Article::FindOrFail($id);
        $article->update($request->all());
        return response()->json([
           'message'=>'updated'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::FindOrFail($id)->delete();
        return response()->json([
            'message'=>'deleted'
        ],200);
    }

    private function uploadImage(Request $request)
    {
        return $request->hasFile('image') ? $request->image->store('public') : null;
    }
}
