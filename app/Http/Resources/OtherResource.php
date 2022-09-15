<?php

namespace App\Http\Resources;

use App\Models\Other;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OtherResource extends JsonResource
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
            'items' => collect($this->items())->map(function (Other $otherItem) {
                return [
                    'id' => $otherItem->id,
                    'user_id' => $otherItem->user_id,
                    'title' => $otherItem->title,
                    'description' => $otherItem->description,
                    'size' => $otherItem->size,
                    'file_uri' => $otherItem->file_uri,
                    'soft_delete' => $otherItem->soft_delete,
                    'times_downloaded' => $otherItem->times_downloaded,
                    'created_at' => $otherItem->created_at,
                    'user' => $otherItem->user,
                ];
            }),
            'links' => $this->resource
        ];
    }
}
