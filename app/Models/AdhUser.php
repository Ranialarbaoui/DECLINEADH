<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
// class AdhUser extends Model
class AdhUser extends Authenticatable
{
	use SoftDeletes;
	protected $table = 'adh_users';
	public $incrementing = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nom',
		'email',
		'password'
	];
}
