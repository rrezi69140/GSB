<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Frai
 * 
 * @property int $id_frais
 * @property int $id_etat
 * @property string $anneemois
 * @property int $id_visiteur
 * @property int|null $nbjustificatifs
 * @property Carbon|null $datemodification
 * @property float|null $montantvalide
 * 
 * @property Etat $etat
 * @property Visiteur $visiteur
 * @property Collection|Fraishorsforfait[] $fraishorsforfaits
 * @property Collection|LigneFraisforfait[] $ligne_fraisforfaits
 *
 * @package App\Models
 */
class Frai extends Model
{
	protected $table = 'frais';
	protected $primaryKey = 'id_frais';
	public $timestamps = false;

	protected $casts = [
		'id_etat' => 'int',
		'id_visiteur' => 'int',
		'nbjustificatifs' => 'int',
		'datemodification' => 'datetime',
		'montantvalide' => 'float'
	];

	protected $fillable = [
		'id_etat',
		'anneemois',
		'id_visiteur',
		'nbjustificatifs',
		'datemodification',
		'montantvalide'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class, 'id_etat');
	}

	public function visiteur()
	{
		return $this->belongsTo(Visiteur::class, 'id_visiteur');
	}

	public function fraishorsforfaits()
	{
		return $this->hasMany(Fraishorsforfait::class, 'id_frais');
	}

	public function ligne_fraisforfaits()
	{
		return $this->hasMany(LigneFraisforfait::class, 'id_frais');
	}
}
