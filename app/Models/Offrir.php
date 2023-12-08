<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Offrir
 * 
 * @property int $id_medicament
 * @property int $id_rapport
 * @property int|null $qte_offerte
 * 
 * @property Medicament $medicament
 * @property RapportVisite $rapport_visite
 *
 * @package App\Models
 */
class Offrir extends Model
{
	protected $table = 'offrir';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_medicament' => 'int',
		'id_rapport' => 'int',
		'qte_offerte' => 'int'
	];

	protected $fillable = [
		'qte_offerte'
	];

	public function medicament()
	{
		return $this->belongsTo(Medicament::class, 'id_medicament');
	}

	public function rapport_visite()
	{
		return $this->belongsTo(RapportVisite::class, 'id_rapport');
	}
}
