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
    protected $primaryKey = 'col_id';
}
