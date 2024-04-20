<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTodo extends Model
{
    /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'users_todo';

    /**
     * create()やupdate()で入力させない ブラックリスト
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
