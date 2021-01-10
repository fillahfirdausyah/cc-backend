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
        $user->email = 'prada7@maillei.net';
        $user->password = Hash::make('laskar22');
        $user->role = 'member';
        $user->email_verified_at = date('d-m-y');
        $user->save();


        // $post = new Post;
        // $post->user_id = 1;
        // $post->content = 'Hallo Ini post pertamakuuu';
        // $post->save();

        // $user->name  = 'Fillah Firdausyah';
        // $user->email = 'fillah@gmail.com';
        // $user->password = Hash::make('laskar22');
        // $user->role = 'admin';
        // $user->email_verified_at = date('d-m-y');
        // $user->save();

        // $user->region()->create([
        //     'region' => 'Manado'
        // ]);
    }
}
