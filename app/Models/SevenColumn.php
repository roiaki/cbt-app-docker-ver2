<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SevenColumn extends Model
{
    // ブラックリスト
    protected $guarded = [
        'id'];

    // Userモデルとの紐づけ
    public function user() {
        
        return $this->belongsTo(User::class);

    }
}
