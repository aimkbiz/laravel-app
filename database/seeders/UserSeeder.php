<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        $param['name'] = 'test';
        $param['email'] = 'test@test.com';
        $param['password'] = Hash::make('A8yS03Tgs');
        $param['created_at'] = $now;
        $param['updated_at'] = $now;
        DB::table('users')->insert($param);
    }
}
