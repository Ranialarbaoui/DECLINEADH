<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bordereau
 * 
 * @property int $id
 * @property Carbon $date_ouverture
 * @property Carbon|null $date_depot
 * @property string $etat
 * @property string|null $numero_reference
 * @property array|null $etats_giss
 * @property string|null $type_bordereau
 * @property int $crgc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $user_id
 * @property int|null $contractante_id
 *
 * @package App\Models
 */
class Bordereau extends Model
{
	use SoftDeletes;
	protected $table = 'bordereaus';

	protected $casts = [
		'date_ouverture' => 'datetime',
		'date_depot' => 'datetime',
		'etats_giss' => 'json',
		'crgc' => 'int',
		'user_id' => 'int',
		'contractante_id' => 'int'
	];

	protected $fillable = [
		'date_ouverture',
		'date_depot',
		'etat',
		'numero_reference',
		'etats_giss',
		'type_bordereau',
		'crgc',
		'user_id',
		'contractante_id'
	];
}
