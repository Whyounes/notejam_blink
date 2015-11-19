<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pad extends Model
{
    protected $table = 'pads';

    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function notes()
    {
        return $this->hasMany('Note');
    }
}
