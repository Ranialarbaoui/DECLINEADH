<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contractante
 * 
 * @property int $code
 * @property string $nom
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $client_id
 *
 * @package App\Models
 */
class Contractante extends Model
{
	use SoftDeletes;
	protected $table = 'contractantes';
	protected $primaryKey = 'code';
	public $incrementing = false;

	protected $casts = [
		'code' => 'int',
		'client_id' => 'int'
	];

	protected $fillable = [
		'nom',
		'client_id'
	];
}
