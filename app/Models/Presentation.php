<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Presentation
 * 
 * @property int $id_presentation
 * @property string|null $lib_presentation
 * 
 * @property Collection|Formuler[] $formulers
 *
 * @package App\Models
 */
class Presentation extends Model
{
	protected $table = 'presentation';
	protected $primaryKey = 'id_presentation';
	public $timestamps = false;

	protected $fillable = [
		'lib_presentation'
	];

	public function formulers()
	{
		return $this->hasMany(Formuler::class, 'id_presentation');
	}
}
