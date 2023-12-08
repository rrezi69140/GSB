<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialite
 * 
 * @property int $id_specialite
 * @property string|null $lib_specialite
 * 
 * @property Collection|Posseder[] $posseders
 *
 * @package App\Models
 */
class Specialite extends Model
{
	protected $table = 'specialite';
	protected $primaryKey = 'id_specialite';
	public $timestamps = false;

	protected $fillable = [
		'lib_specialite'
	];

	public function posseders()
	{
		return $this->hasMany(Posseder::class, 'id_specialite');
	}
}
