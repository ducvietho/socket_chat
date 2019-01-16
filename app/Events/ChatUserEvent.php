<?php

namespace App\Events;

use App\ChatRoom;
use App\Http\Resources\GroupResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;


class ChatUserEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $chat;
    public $data;
    public function __construct(ChatRoom $chatRoom)
    {
        $this->chat = $chatRoom;
        $this->data = array(
            'power'=> '10'
        );
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel_user_'.$this->chat->id);
    }

    /**
     *
     */
    public function broadcastWith(){
        return [
            'message'=>$this->chat->chat,
            'user'=>[
                'id'=>$this->chat->user->id,
                'name'=>$this->chat->user->name
            ]
        ];

//        return array([
//            'data'=>$this->chat
//        ]);
    }
}
