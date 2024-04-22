<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class MasterAiChat extends Model
{
    use HasFactory;
        /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'master_ai_chat';

    public static function allCache() {
        if (Cache::get("MasterAiChat") == null) {
            $aiChats = MasterAiChat::all();
            Cache::put("MasterAiChat", $aiChats, 60 * 60 * 24);
        } else {
            $aiChats = Cache::get("MasterAiChat");
        }
        return $aiChats;
    }
}
