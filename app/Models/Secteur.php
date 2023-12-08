<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Secteur
 * 
 * @property int $id_secteur
 * @property string|null $lib_secteur
 * 
 * @property Collection|Region[] $regions
 * @property Collection|Visiteur[] $visiteurs
 *
 * @package App\Models
 */
class Secteur extends Model
{
	protected $table = 'secteur';
	protected $primaryKey = 'id_secteur';
	public $timestamps = false;

	protected $fillable = [
		'lib_secteur'
	];

	public function regions()
	{
		return $this->hasMany(Region::class, 'id_secteur');
	}

	public function visiteurs()
	{
		return $this->hasMany(Visiteur::class, 'id_secteur');
	}
}
