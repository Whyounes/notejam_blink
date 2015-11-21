<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    public function pad()
    {
        return $this->belongsTo('app\models\Pad');
    }

    public function user()
    {
        return $this->belongsTo('app\models\User');
    }
}
