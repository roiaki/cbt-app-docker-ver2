<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    /*
     * テーブルの主キー
     * 
     * @var string
     */
    protected $primaryKey = 'event_id';
}
