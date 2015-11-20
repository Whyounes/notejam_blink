<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pad extends Model
{
    protected $table = 'pads';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }
}
