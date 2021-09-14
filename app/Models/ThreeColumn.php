<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreeColumn extends Model
{
    use HasFactory;

    /*
     * テーブルの主キー
     * 
     * @var string
     */
    protected $primaryKey = 'threecol_id';

    // ホワイトリスト　
    protected $fillable = [
    
    ];

    public function user()
    {
        // belongsTo 子から親へ　従から主へ
        // 第1引数：リレーション先の親モデル
        // 第2引数：外部キー「親を判別するための値が格納されている、子テーブルのカラム名」
        // 第3引数：親を判別する値が格納された「親がもつ」カラム
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function event()
    {
        // belongsTo 子から親へ　従から主へ
        // 第1引数：リレーション先の親モデル
        // 第2引数：外部キー「親を判別するための値が格納されている、子テーブルのカラム名」
        // 第3引数：親を判別する値が格納された「親がもつ」カラム
        return $this->belongsTo(Event::class, 'event_id', 'event_id'); 
    }
}

