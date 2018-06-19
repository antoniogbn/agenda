<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'id',
        'nome'
    ];
    
    protected $table = 'pessoas';
    
/*   public function pessoa()
    {
        $this->belongsTo(Pessoa::class, 'pessoa_id');
    }*/

    public function telefone()
    {
        return $this->hasMany(Telefone::class,'pessoa_id');
    }
    
    public function novoView()
    {
        return view('pessoas.create');
    }
}
