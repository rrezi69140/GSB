<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prescrire
 * 
 * @property int $id_dosage
 * @property int $id_medicament
 * @property int $id_type_individu
 * @property string|null $posologie
 * 
 * @property Dosage $dosage
 * @property Medicament $medicament
 * @property TypeIndividu $type_individu
 *
 * @package App\Models
 */
class Prescrire extends Model
{
	protected $table = 'prescrire';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_dosage' => 'int',
		'id_medicament' => 'int',
		'id_type_individu' => 'int'
	];

	protected $fillable = [
		'posologie'
	];

	public function dosage()
	{
		return $this->belongsTo(Dosage::class, 'id_dosage');
	}

	public function medicament()
	{
		return $this->belongsTo(Medicament::class, 'id_medicament');
	}

	public function type_individu()
	{
		return $this->belongsTo(TypeIndividu::class, 'id_type_individu');
	}
}
