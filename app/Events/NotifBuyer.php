<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaksi;

class NotifBuyer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fields;

    public function __construct($fields)
    {
        
        $this->fields = $fields;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return ['notif-buyer.'.$this->fields->buyer_id];
        return ['notif-buyer'];
    }

    public function broadcastAs()
    {
        return 'Notif-Buyer';
    }

    // public function broadcastWith()
    // {
    //     return ['message' => $this->fields->status];
    // }
}
