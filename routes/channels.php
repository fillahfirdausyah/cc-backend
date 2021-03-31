<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Transaksi;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('notif-buyer.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notif-buyer', function ($user, $id) {
    return true;
});


Broadcast::channel('notif-seller.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});