<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Praticien
 * 
 * @property int $id_praticien
 * @property int|null $id_type_praticien
 * @property string|null $nom_praticien
 * @property string|null $prenom_praticien
 * @property string|null $adresse_praticien
 * @property string|null $cp_praticien
 * @property string|null $ville_praticien
 * @property float|null $coef_notoriete
 * 
 * @property TypePraticien|null $type_praticien
 * @property Collection|Inviter[] $inviters
 * @property Collection|Posseder[] $posseders
 * @property Collection|RapportVisite[] $rapport_visites
 * @property Collection|StatsPrescription[] $stats_prescriptions
 *
 * @package App\Models
 */
class Praticien extends Model
{
	protected $table = 'praticien';
	protected $primaryKey = 'id_praticien';
	public $timestamps = false;

	protected $casts = [
		'id_type_praticien' => 'int',
		'coef_notoriete' => 'float'
	];

	protected $fillable = [
		'id_type_praticien',
		'nom_praticien',
		'prenom_praticien',
		'adresse_praticien',
		'cp_praticien',
		'ville_praticien',
		'coef_notoriete'
	];

	public function type_praticien()
	{
		return $this->belongsTo(TypePraticien::class, 'id_type_praticien');
	}

	public function inviters()
	{
		return $this->hasMany(Inviter::class, 'id_praticien');
	}

	public function posseders()
	{
		return $this->hasMany(Posseder::class, 'id_praticien');
	}

	public function rapport_visites()
	{
		return $this->hasMany(RapportVisite::class, 'id_praticien');
	}

	public function stats_prescriptions()
	{
		return $this->hasMany(StatsPrescription::class, 'id_praticien');
	}
}
