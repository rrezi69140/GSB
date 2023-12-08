<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etat
 * 
 * @property int $id_etat
 * @property string|null $lib_etat
 * 
 * @property Collection|Frai[] $frais
 *
 * @package App\Models
 */
class Etat extends Model
{
	protected $table = 'etat';
	protected $primaryKey = 'id_etat';
	public $timestamps = false;

	protected $fillable = [
		'lib_etat'
	];

	public function frais()
	{
		return $this->hasMany(Frai::class, 'id_etat');
	}
}
