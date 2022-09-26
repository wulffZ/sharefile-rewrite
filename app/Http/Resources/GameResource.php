<?php

namespace App\Http\Resources;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class GameResource extends JsonResource
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
            'items' => collect($this->items())->map(function (Game $gameItem) {
                return [
                    'id' => $gameItem->id,
                    'user_id' => $gameItem->user_id,
                    'title' => $gameItem->title,
                    'description' => $gameItem->description,
                    'size' => $gameItem->size,
                    'file_uri' => $gameItem->file_uri,
                    'thumbnail_uri' => $gameItem->thumbnail_uri,
                    'soft_delete' => $gameItem->soft_delete,
                    'times_downloaded' => $gameItem->times_downloaded,
                    'created_at' => $gameItem->created_at,
                    'user' => $gameItem->user,
                ];
            }),
            'links' => $this->resource
        ];
    }
}
