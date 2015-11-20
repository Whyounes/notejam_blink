<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    public function pad()
    {
        return $this->belongsTo('App\Models\Pad');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
