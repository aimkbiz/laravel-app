<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MasterAiChatSeeder extends Seeder
{
    public function run(): void
    {
        $params = 
        [
            ['chat' => 'reactは勉強中です'],
            ['chat' => 'laravelもやっています'],
            ['chat' => 'seederやFacadesを学習中です']
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('master_ai_chat')->insert($param);
        }
    }
}
