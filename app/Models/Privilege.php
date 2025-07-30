<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Privilege
 * 
 * @property int $id
 * @property string $intitule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Privilege extends Model
{
	use SoftDeletes;
	protected $table = 'privileges';

	protected $fillable = [
		'intitule'
	];
}
