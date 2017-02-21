<?php

use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 1. Publish event with redis
// 2. Node.js = Redis subscribes to the Event
// 3. the socket.io to emit to all clients

Route::get('/', function () {
    $data = [
      'event' => 'UserSignedUp',
      'data'  => [
        'username' => 'Hamer'
      ]
    ]
    Redis::publish('test-channel',json_encode($data));
    return "Done";
    // return view('welcome');
});
