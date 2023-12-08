<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Visiteur
 * 
 * @property int $id_visiteur
 * @property int|null $id_laboratoire
 * @property int|null $id_secteur
 * @property string|null $nom_visiteur
 * @property string|null $prenom_visiteur
 * @property string|null $adresse_visiteur
 * @property string|null $cp_visiteur
 * @property string|null $ville_visiteur
 * @property Carbon|null $date_embauche
 * @property string|null $login_visiteur
 * @property string|null $pwd_visiteur
 * @property string|null $type_visiteur
 * 
 * @property Laboratoire|null $laboratoire
 * @property Secteur|null $secteur
 * @property Collection|Frai[] $frais
 * @property Collection|RapportVisite[] $rapport_visites
 * @property Collection|Realiser[] $realisers
 * @property Collection|Travailler[] $travaillers
 *
 * @package App\Models
 */
class Visiteur extends Model
{
	protected $table = 'visiteur';
	protected $primaryKey = 'id_visiteur';
	public $timestamps = false;

	protected $casts = [
		'id_laboratoire' => 'int',
		'id_secteur' => 'int',
		'date_embauche' => 'datetime'
	];

	protected $fillable = [
		'id_laboratoire',
		'id_secteur',
		'nom_visiteur',
		'prenom_visiteur',
		'adresse_visiteur',
		'cp_visiteur',
		'ville_visiteur',
		'date_embauche',
		'login_visiteur',
		'pwd_visiteur',
		'type_visiteur'
	];

	public function laboratoire()
	{
		return $this->belongsTo(Laboratoire::class, 'id_laboratoire');
	}

	public function secteur()
	{
		return $this->belongsTo(Secteur::class, 'id_secteur');
	}

	public function frais()
	{
		return $this->hasMany(Frai::class, 'id_visiteur');
	}

	public function rapport_visites()
	{
		return $this->hasMany(RapportVisite::class, 'id_visiteur');
	}

	public function realisers()
	{
		return $this->hasMany(Realiser::class, 'id_visiteur');
	}

	public function travaillers()
	{
		return $this->hasMany(Travailler::class, 'id_visiteur');
	}
}
