<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Laboratoire
 * 
 * @property int $id_laboratoire
 * @property string|null $nom_laboratoire
 * @property string|null $chef_vente
 * 
 * @property Collection|Visiteur[] $visiteurs
 *
 * @package App\Models
 */
class Laboratoire extends Model
{
	protected $table = 'laboratoire';
	protected $primaryKey = 'id_laboratoire';
	public $timestamps = false;

	protected $fillable = [
		'nom_laboratoire',
		'chef_vente'
	];

	public function visiteurs()
	{
		return $this->hasMany(Visiteur::class, 'id_laboratoire');
	}
}
