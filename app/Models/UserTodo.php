<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTodo extends Model
{
    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'users_todo';
}
