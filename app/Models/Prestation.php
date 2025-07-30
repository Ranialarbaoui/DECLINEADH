<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prestation
 * 
 * @property string $codepres
 * @property string|null $libepres
 * @property string|null $codfampr
 * @property string|null $code_cle
 * @property int|null $nume_lot
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Prestation extends Model
{
	use SoftDeletes;
	protected $table = 'prestations';
	protected $primaryKey = 'codepres';
	public $incrementing = false;

	protected $casts = [
		'nume_lot' => 'int'
	];

	protected $fillable = [
		'libepres',
		'codfampr',
		'code_cle',
		'nume_lot'
	];
}
