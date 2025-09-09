<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Adherent
 * 
 * @property int $code_adh
 * @property string $liberisq
 * @property Carbon|null $date_enrg
 * @property Carbon|null $datenais
 * @property string|null $sexerisq
 * @property int $numegrou
 * @property string|null $numeimma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $intermediaire_id
 * @property int|null $police_id
 *
 * @package App\Models
 */
class Adherent extends Model
{
	use SoftDeletes;
	protected $table = 'adherents';
	protected $primaryKey = 'code_adh';
	public $incrementing = false;

	protected $casts = [
		'code_adh' => 'int',
		'date_enrg' => 'datetime',
		'datenais' => 'datetime',
		'numegrou' => 'int',
		'intermediaire_id' => 'int',
		'police_id' => 'int'
	];

	protected $fillable = [
		'liberisq',
		'date_enrg',
		'datenais',
		'sexerisq',
		'numegrou',
		'numeimma',
		'intermediaire_id',
		'police_id'
	];
}
