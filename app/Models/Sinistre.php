<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sinistre
 * 
 * @property int $id
 * @property string $nompre_adherent
 * @property string $nompre_beneficiaire
 * @property string|null $observation
 * @property Carbon $date_soin
 * @property bool|null $police_notcouverte
 * @property array|null $listes_des_fichiers
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $bordereau_id
 * @property int|null $intermediaire_id
 * @property int|null $police_id
 *
 * @package App\Models
 */
class Sinistre extends Model
{
	use SoftDeletes;
	protected $table = 'sinistres';

	protected $casts = [
		'date_soin' => 'datetime',
		'police_notcouverte' => 'bool',
		'listes_des_fichiers' => 'json',
		'bordereau_id' => 'int',
		'intermediaire_id' => 'int',
		'police_id' => 'int'
	];

	protected $fillable = [
		'nompre_adherent',
		'nompre_beneficiaire',
		'observation',
		'date_soin',
		'police_notcouverte',
		'listes_des_fichiers',
		'type',
		'bordereau_id',
		'intermediaire_id',
		'police_id'
	];
}
