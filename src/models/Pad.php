<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Pad extends Model
{
    protected $table = 'pads';

    public function user()
    {
        return $this->belongsTo('app\models\User');
    }
    
    public function notes()
    {
        return $this->hasMany('app\models\Note');
    }
}
