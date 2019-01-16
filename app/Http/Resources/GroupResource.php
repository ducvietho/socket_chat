<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $check_follow = [];

        if (!empty($this->getmembers)) {
            foreach ($this->getmembers as $value) {
                array_push($check_follow, $value->user_id);
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'cover_hashtag'=>($this->cover_hashtag==null)?"":($this->cover_hashtag),
            'feed_number' =>  (!empty($this->feeds))?$this->feeds->count():0,
            'number_follow'=> (!empty($this->getmembers))?$this->getmembers->count():0,
            'followed' => (in_array(Auth::id(), $check_follow)) ? 1 : 0
        ];
        // return parent::toArray($request);
    }
}
