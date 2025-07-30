<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Queue
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $password
 * @property string $type_mail
 * @property int|null $bordereau_id
 * @property string|null $numero_reference
 * @property int|null $crgc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Queue extends Model
{
	use SoftDeletes;
	protected $table = 'queues';

	protected $casts = [
		'user_id' => 'int',
		'bordereau_id' => 'int',
		'crgc' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'user_id',
		'password',
		'type_mail',
		'bordereau_id',
		'numero_reference',
		'crgc'
	];
}
