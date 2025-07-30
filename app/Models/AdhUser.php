<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AdhUser
 * 
 * @property string $id
 * @property string $nom
 * @property string $email
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class AdhUser extends Model
{
	use SoftDeletes;
	protected $table = 'adh_users';
	public $incrementing = false;
    protected $primaryKey = 'id';
	protected $hidden = [
		'password'
	];
	protected $keyType = 'string';
protected $dates =['created_at'];
	protected $fillable = [
		'id',
		'nom',
		'email',
		'password'
	];
	public function getAuthIdentifierName()
{
    return 'id';
}
}
