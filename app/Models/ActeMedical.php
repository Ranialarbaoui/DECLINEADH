<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActeMedical
 * 
 * @property string $codepres
 * @property string $libepres
 * @property string $type
 * @property int $nbr_doc
 *
 * @package App\Models
 */
class ActeMedical extends Model
{
	protected $table = 'acte_medical';
	protected $primaryKey = 'codepres';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nbr_doc' => 'int'
	];

	protected $fillable = [
		'libepres',
		'type',
		'nbr_doc'
	];
}
