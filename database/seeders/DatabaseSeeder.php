<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User;
        $user->name  = 'Prada new Florista';
<<<<<<< HEAD
        $user->email = 'prada3@maillei.net';
=======
        $user->email = 'prada@maillei.net';
>>>>>>> 582a2f3a2ba9f490b005603b8e452a6c8d0058d8
        $user->password = Hash::make('laskar22');
        $user->role = 'member';
        $user->email_verified_at = date('d-m-y');
        $user->save();


        // $post = new Post;
<<<<<<< HEAD
        // $post->user_id = 2;
=======
        // $post->user_id = 11;
>>>>>>> 582a2f3a2ba9f490b005603b8e452a6c8d0058d8
        // $post->content = 'Hallo Ini post pertamakuuu';
        // $post->save();

        // $user->name  = 'Fillah Firdausyah';
        // $user->email = 'prada1@maillei.net';
        // $user->password = Hash::make('laskar22');
        // $user->role = 'admin';
        // $user->email_verified_at = date('d-m-y');
        // $user->save();

        $user->region()->create([
            'region' => 'Aceh'
        ]);
    }
}
