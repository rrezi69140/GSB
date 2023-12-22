<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inviter
 * 
 * @property int $id_activite_compl
 * @property int $id_praticien
 * @property string $specialiste
 * 
 * @property ActiviteCompl $activite_compl
 * @property Praticien $praticien
 *
 * @package App\Models
 */
class Inviter extends Model
{
	protected $table = 'inviter';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_activite_compl' => 'int',
		'id_praticien' => 'int'
	];

	protected $fillable = [
		'specialiste'
	];

	public function activite_compl()
	{
		return $this->belongsTo(ActiviteCompl::class, 'id_activite_compl');
	}

	public function praticien()
	{
		return $this->belongsTo(Praticien::class, 'id_praticien');
	}
}
