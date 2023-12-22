<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StatsPrescription
 * 
 * @property int $id_praticien
 * @property int $id_medicament
 * @property int $annee_mois
 * @property int|null $quantite
 * 
 * @property Medicament $medicament
 * @property Praticien $praticien
 *
 * @package App\Models
 */
class StatsPrescription extends Model
{
	protected $table = 'stats_prescriptions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_praticien' => 'int',
		'id_medicament' => 'int',
		'annee_mois' => 'int',
		'quantite' => 'int'
	];

	protected $fillable = [
		'quantite'
	];

	public function medicament()
	{
		return $this->belongsTo(Medicament::class, 'id_medicament');
	}

	public function praticien()
	{
		return $this->belongsTo(Praticien::class, 'id_praticien');
	}
}
