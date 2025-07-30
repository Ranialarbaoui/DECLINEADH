<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MotifRejet
 * 
 * @property int $id
 * @property string $libelle
 *
 * @package App\Models
 */
class MotifRejet extends Model
{
	protected $table = 'motif_rejets';
	public $timestamps = false;

	protected $fillable = [
		'libelle'
	];
}
