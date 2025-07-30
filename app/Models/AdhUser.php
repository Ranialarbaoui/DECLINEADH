<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
class AdhUser extends Authenticatable
{
	use SoftDeletes;
	
	protected $table = 'adh_users';
	public $incrementing = false;
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	
	protected $hidden = [
		'password'
	];
	
	protected $dates = ['created_at'];
	
	protected $fillable = [
		'id',
		'nom',
		'email',
		'password'
	];
	
	/**
	 * Get the name of the unique identifier for the user.
	 *
	 * @return string
	 */
	public function getAuthIdentifierName()
	{
		return 'id';
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getAttribute($this->getAuthIdentifierName());
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the "remember me" token value.
	 *
	 * @return string|null
	 */
	public function getRememberToken()
	{
		return $this->remember_token ?? null;
	}

	/**
	 * Set the "remember me" token value.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		// Since remember_token column doesn't exist in migration,
		// we'll just ignore it for now
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}
}
