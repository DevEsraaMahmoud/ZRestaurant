<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class booking extends Model
{
    use HasFactory,Notifiable;
    protected $guarded = [];

    public function Table(){
        return $this-> belongsTo(Table::class,'table_id','id');
    }
}
