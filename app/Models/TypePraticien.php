<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypePraticien
 * 
 * @property int $id_type_praticien
 * @property string|null $lib_type_praticien
 * @property string|null $lieu_type_praticien
 * 
 * @property Collection|Praticien[] $praticiens
 *
 * @package App\Models
 */
class TypePraticien extends Model
{
	protected $table = 'type_praticien';
	protected $primaryKey = 'id_type_praticien';
	public $timestamps = false;

	protected $fillable = [
		'lib_type_praticien',
		'lieu_type_praticien'
	];

	public function praticiens()
	{
		return $this->hasMany(Praticien::class, 'id_type_praticien');
	}
}
