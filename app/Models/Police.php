<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Police
 * 
 * @property int $numepoli
 * @property string $raissoci
 * @property Carbon|null $dateeffe
 * @property Carbon|null $dateeche
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $intermediaire_id
 * @property int|null $contractante_id
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Police extends Model
{
	use SoftDeletes;
	protected $table = 'polices';
	public $incrementing = false;

	protected $casts = [
		'numepoli' => 'int',
		'dateeffe' => 'datetime',
		'dateeche' => 'datetime',
		'intermediaire_id' => 'int',
		'contractante_id' => 'int'
	];

	protected $fillable = [
		'raissoci',
		'dateeffe',
		'dateeche',
		'contractante_id'
	];
}
