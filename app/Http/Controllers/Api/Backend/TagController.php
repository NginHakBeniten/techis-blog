<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * index
     */
    public function index(Request $request)
    {
        $tags = Tag::paginate();
        return $this->successPaginateResponse(TagResource::collection($tags));
    }

    /**
     * show
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return $this->successResponse(new TagResource($tag));
    }

    /**
     * validation
     */
    private function validation(Request $request, $id = '')
    {
        return $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:tags,slug,' . $id,
        ]);
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        $data = $this->validation($request);
        $tag = Tag::create($data);

        return $this->successResponse(new TagResource($tag));
    }

    /**
     * update
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $data = $this->validation($request, $id);

        $tag->update($data);

        return $this->successResponse(new TagResource($tag));
    }

    /**
     * delete
     */
    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->articles()->detach();
        $tag->delete();

        return $this->successMessage('deleted');
    }
}
