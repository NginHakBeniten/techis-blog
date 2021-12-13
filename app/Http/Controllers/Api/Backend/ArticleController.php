<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * index
     */
    public function index(Request $request)
    {
        $articles = Article::with('tags')->paginate();
        return $this->successPaginateResponse(ArticleResource::collection($articles));
    }

    /**
     * validation
     */
    private function validation(Request $request, $id = '')
    {
        return $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|unique:articles,slug,' . $id,
            'main_image' => 'required',
            'body' => 'required',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);
    }

    /**
     * show
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        
        return $this->successResponse(new ArticleResource($article));
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        $data = $this->validation($request);
        $article = Article::create($data);

        if  ($request->has('tags') && count($request->tags)) {
            $article->tags()->attach($request->tags);
        }

        return $this->successResponse(new ArticleResource($article));
    }

    /**
     * update
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $this->validation($request, $id);

        $article->update($data);

        if  ($request->has('tags') && count($request->tags)) {
            $article->tags()->sync($request->tags);
        }

        return $this->successResponse(new ArticleResource($article));
    }

    /**
     * delete
     */
    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        $article->delete();

        return $this->successMessage('deleted');
    }
}
