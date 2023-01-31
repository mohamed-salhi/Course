<?php

use Illuminate\Support\Facades\Broadcast;

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
Broadcast::channel('chat_group', function ($user) {
     if ($user->hasAbility('chat.view')){
        return true;}

},['guards'=>['admin']]);
Broadcast::channel('online', function ($user) {

    if ($user->hasAbility('chat.view')){
        return $user;}

},['guards'=>['admin']]);
