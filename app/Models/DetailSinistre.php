<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailSinistre
 * 
 * @property int $id
 * @property bool|null $etat
 * @property string|null $observation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $sinistre_id
 * @property string $prestation_id
 *
 * @package App\Models
 */
class DetailSinistre extends Model
{
	use SoftDeletes;
	protected $table = 'detail_sinistres';

	protected $casts = [
		'etat' => 'bool',
		'sinistre_id' => 'int'
	];

	protected $fillable = [
		'etat',
		'observation',
		'sinistre_id',
		'prestation_id'
	];
}
