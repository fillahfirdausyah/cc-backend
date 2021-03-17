<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;

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

        $user = [
            [
                'name'      => 'Prada Florista',
                'email'     => 'prada@maillei.net',
                'password'  =>  Hash::make('laskar22'),
                'nopung'    => 'G#-ADM',
                'role'      => 'admin',
                'verified'  => 'yes',
                'email_verified_at' => date('d-m-y')
            ],
            [
                'name'      => 'Fillah Firdausyah',
                'email'     => 'fillah@maillei.net',
                'password'  =>  Hash::make('laskar22'),
                'nopung'    => 'G#-2',
                'role'      => 'member',
                'verified'  => 'yes',
                'email_verified_at' => date('d-m-y')
            ],
            [
                'name'      => 'Vanka Valezka',
                'email'     => 'vanka@maillei.net',
                'password'  =>  Hash::make('laskar22'),
                'nopung'    => 'G#-3',
                'role'      => 'bendahara',
                'verified'  => 'yes',
                'email_verified_at' => date('d-m-y')
            ]
        ];

        User::insert($user);

        User::find(1)->profile()->create([
            'user_id'   => 2,
            'bio'       => 'Saya Pecinta Kucing',
            'pekerjaan' => 'Programmer',
            'domisili'  => 'Ponorogo',
            'alamat'    => 'Waringin Sari',
            'hobi'      => 'Update Tech',
        ]);
        
        User::find(2)->profile()->create([
            'user_id'   => 2,
            'bio'       => 'Saya Pecinta Kucing',
            'pekerjaan' => 'Programmer',
            'domisili'  => 'Manado',
            'alamat'    => 'Waringin Sari',
            'hobi'      => 'Update Tech',
        ]);
        
        User::find(3)->profile()->create([
            'user_id'   => 2,
            'bio'       => 'Saya Pecinta Kucing',
            'pekerjaan' => 'Programmer',
            'domisili'  => 'Surabaya',
            'alamat'    => 'Waringin Sari',
            'hobi'      => 'Update Tech',
        ]);

        User::find(1)->region()->create([
            'region' => 'Ponorogo'
        ]);
        User::find(2)->region()->create([
            'region' => 'Manado'
        ]);
        User::find(3)->region()->create([
            'region' => 'Surabaya'
        ]);
    }
}
