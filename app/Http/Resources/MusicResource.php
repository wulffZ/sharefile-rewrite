<?php

namespace App\Http\Resources;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'items' => collect($this->items())->map(function (Music $musicItem) {
                return [
                    'id' => $musicItem->id,
                    'user_id' => $musicItem->user_id,
                    'title' => $musicItem->title,
                    'artist' => $musicItem->artist,
                    'size' => $musicItem->size,
                    'file_uri' => $musicItem->file_uri,
                    'thumbnail_uri' => $musicItem->thumbnail_uri,
                    'soft_delete' => $musicItem->soft_delete,
                    'times_downloaded' => $musicItem->times_downloaded,
                    'created_at' => $musicItem->created_at,
                    'user' => $musicItem->user,
                ];
            }),
            'links' => $this->resource
        ];
    }
}
