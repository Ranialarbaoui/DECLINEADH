<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Beneficiaire
 * 
 * @property int $code_benef
 * @property string $nom_memb
 * @property string $lienpare
 * @property Carbon|null $datenais
 * @property Carbon|null $date_enrg
 * @property string|null $flagscol
 * @property int|null $src
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $adherent_id
 *
 * @package App\Models
 */
class Beneficiaire extends Model
{
	use SoftDeletes;
	protected $table = 'beneficiaires';
	protected $primaryKey = 'code_benef';
	public $incrementing = false;

	protected $casts = [
		'code_benef' => 'int',
		'datenais' => 'datetime',
		'date_enrg' => 'datetime',
		'src' => 'int',
		'adherent_id' => 'int'
	];

	protected $fillable = [
		'nom_memb',
		'lienpare',
		'datenais',
		'date_enrg',
		'flagscol',
		'src',
		'adherent_id'
	];
}
