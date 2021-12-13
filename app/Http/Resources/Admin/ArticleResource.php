<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'main_image' => $this->main_image,
            'body' => $this->body,
            'tags' => $this->whenLoaded('tags', $this->tags->map(function($tag) {
                return $tag->only('id', 'name');
            }))
        ];
    }
}
