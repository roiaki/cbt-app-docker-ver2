<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    /*
     * テーブルの主キー
     * 
     * @var string
     */
    protected $primaryKey = 'event_id';


    /*
     * 1対多（逆）所属
     * eventを所有しているuserを取得 
     */
    public function user()
    {
        return $this>belongsTo(User::class, 'user_id');
    }
}
