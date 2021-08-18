<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable=[
        'num',
        'ci',
        'contribuyente',
        'numero',
        'numtramite',
        'numhoja',
        'lugar',
        'tipo',
        'fecha',
        'hora',
        'tipo2',
        'tipo3',
        'gestion',
        'detalle',
        'user_id',
        'contribuyente_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
