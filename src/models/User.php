<?php
namespace App\Models;

use blink\auth\Authenticatable;
use blink\core\Object;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Hashing\BcryptHasher as Hash;

class User extends Model implements Authenticatable
{
    protected $table = 'users';
    
    public static function findIdentity($id)
    {
        if (is_numeric($id) || (is_array($id) && isset($id['id']))) {
            return static::where('id', $id)->first();
        } else if (is_string($id) || (is_array($id) && isset($id['email'])) ) {
            return static::where('email', $id)->first();
        } else {
            throw new \InvalidParamException("The param: id is invalid.");
        }
    }

    public function getAuthId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return (new Hash)->check($password, $this->password);
    }
}
