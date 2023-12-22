<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Realiser
 * 
 * @property int $id_activite_compl
 * @property int $id_visiteur
 * @property float|null $montant_ac
 * 
 * @property ActiviteCompl $activite_compl
 * @property Visiteur $visiteur
 *
 * @package App\Models
 */
class Realiser extends Model
{
	protected $table = 'realiser';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_activite_compl' => 'int',
		'id_visiteur' => 'int',
		'montant_ac' => 'float'
	];

	protected $fillable = [
		'montant_ac'
	];

	public function activite_compl()
	{
		return $this->belongsTo(ActiviteCompl::class, 'id_activite_compl');
	}

	public function visiteur()
	{
		return $this->belongsTo(Visiteur::class, 'id_visiteur');
	}
}
