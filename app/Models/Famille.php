<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Famille
 * 
 * @property int $id_famille
 * @property string|null $lib_famille
 * 
 * @property Collection|Medicament[] $medicaments
 *
 * @package App\Models
 */
class Famille extends Model
{
	protected $table = 'famille';
	protected $primaryKey = 'id_famille';
	public $timestamps = false;

	protected $fillable = [
		'lib_famille'
	];

	public function medicaments()
	{
		return $this->hasMany(Medicament::class, 'id_famille');
	}
}
