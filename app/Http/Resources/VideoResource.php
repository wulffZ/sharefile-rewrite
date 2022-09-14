<?php

namespace App\Http\Resources;

use App\Models\Video;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'items' => collect($this->items())->map(function (Video $videoItem) {
                return [
                    'id' => $videoItem->id,
                    'user_id' => $videoItem->user_id,
                    'title' => $videoItem->title,
                    'description' => $videoItem->description,
                    'size' => $videoItem->size,
                    'file_uri' => $videoItem->file_uri,
                    'thumbnail_uri' => $videoItem->thumbnail_uri,
                    'soft_delete' => $videoItem->soft_delete,
                    'times_downloaded' => $videoItem->times_downloaded,
                    'created_at' => $videoItem->created_at,
                    'user' => $videoItem->user,
                    'temporary_url' => Storage::temporaryUrl(
                        $videoItem->file_uri, now()->addHour(2)
                    )
                ];
            }),
            'links' => $this->resource
        ];
    }
}
