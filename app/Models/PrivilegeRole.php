<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PrivilegeRole
 * 
 * @property int $privilege_id
 * @property int $role_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PrivilegeRole extends Model
{
	protected $table = 'privilege_role';
	public $incrementing = false;

	protected $casts = [
		'privilege_id' => 'int',
		'role_id' => 'int'
	];
}
