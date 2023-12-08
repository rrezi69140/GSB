<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $id_region
 * @property int|null $id_secteur
 * @property string|null $nom_region
 * 
 * @property Secteur|null $secteur
 * @property Collection|Travailler[] $travaillers
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'region';
	protected $primaryKey = 'id_region';
	public $timestamps = false;

	protected $casts = [
		'id_secteur' => 'int'
	];

	protected $fillable = [
		'id_secteur',
		'nom_region'
	];

	public function secteur()
	{
		return $this->belongsTo(Secteur::class, 'id_secteur');
	}

	public function travaillers()
	{
		return $this->hasMany(Travailler::class, 'id_region');
	}
}
