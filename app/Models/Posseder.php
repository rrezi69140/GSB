<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Posseder
 * 
 * @property int $id_praticien
 * @property int $id_specialite
 * @property string|null $diplome
 * @property float|null $coef_prescription
 * 
 * @property Praticien $praticien
 * @property Specialite $specialite
 *
 * @package App\Models
 */
class Posseder extends Model
{
	protected $table = 'posseder';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_praticien' => 'int',
		'id_specialite' => 'int',
		'coef_prescription' => 'float'
	];

	protected $fillable = [
		'diplome',
		'coef_prescription'
	];

	public function praticien()
	{
		return $this->belongsTo(Praticien::class, 'id_praticien');
	}

	public function specialite()
	{
		return $this->belongsTo(Specialite::class, 'id_specialite');
	}
}
