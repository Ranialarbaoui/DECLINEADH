<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KrUser
 * 
 * @property string $login
 * @property string $pwd
 *
 * @package App\Models
 */
class KrUser extends Model
{
	protected $table = 'kr_users';
	protected $primaryKey = 'login';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'pwd'
	];
}
