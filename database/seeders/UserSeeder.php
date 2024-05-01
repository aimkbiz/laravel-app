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
        // ローカルのみ作成
        if (env('APP_ENV') == 'local') {
            $now = Carbon::now();
            $param['name'] = 'test';
            $param['email'] = env('TEST_LOGIN_MAIL');
            $param['password'] = Hash::make(env('TEST_LOGIN_PW'));
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}
