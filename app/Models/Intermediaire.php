<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Intermediaire
 * 
 * @property int $codeinte
 * @property string|null $raisocin
 * @property string|null $adreinte
 * @property int|null $numepate
 * @property int|null $numeimpo
 * @property int|null $nume_tva
 * @property int|null $numecnss
 * @property int|null $capisoci
 * @property string|null $teleinte
 * @property string|null $telexint
 * @property string|null $faxinter
 * @property string|null $numeagre
 * @property Carbon|null $datenomi
 * @property int|null $regicomm
 * @property string|null $codtypin
 * @property int|null $codevill
 * @property int|null $codecomp
 * @property string|null $flagtimb
 * @property Carbon|null $datfinac
 * @property int|null $lieninte
 * @property int|null $nume_lot
 * @property string|null $jourreas
 * @property int|null $lieintre
 * @property string|null $flagtest
 * @property int|null $lienregroupe
 * @property int|null $nature_reseau
 * @property int|null $type_region
 * @property string|null $rib_bancaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Intermediaire extends Model
{
	use SoftDeletes;
	protected $table = 'intermediaires';
	protected $primaryKey = 'codeinte';
	public $incrementing = false;

	protected $casts = [
		'codeinte' => 'int',
		'numepate' => 'int',
		'numeimpo' => 'int',
		'nume_tva' => 'int',
		'numecnss' => 'int',
		'capisoci' => 'int',
		'datenomi' => 'datetime',
		'regicomm' => 'int',
		'codevill' => 'int',
		'codecomp' => 'int',
		'datfinac' => 'datetime',
		'lieninte' => 'int',
		'nume_lot' => 'int',
		'lieintre' => 'int',
		'lienregroupe' => 'int',
		'nature_reseau' => 'int',
		'type_region' => 'int'
	];

	protected $fillable = [
		'raisocin',
		'adreinte',
		'numepate',
		'numeimpo',
		'nume_tva',
		'numecnss',
		'capisoci',
		'teleinte',
		'telexint',
		'faxinter',
		'numeagre',
		'datenomi',
		'regicomm',
		'codtypin',
		'codevill',
		'codecomp',
		'flagtimb',
		'datfinac',
		'lieninte',
		'nume_lot',
		'jourreas',
		'lieintre',
		'flagtest',
		'lienregroupe',
		'nature_reseau',
		'type_region',
		'rib_bancaire'
	];
}
