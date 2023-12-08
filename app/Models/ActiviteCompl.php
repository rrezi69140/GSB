<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActiviteCompl
 * 
 * @property int $id_activite_compl
 * @property Carbon|null $date_activite
 * @property string|null $lieu_activite
 * @property string|null $theme_activite
 * @property string|null $motif_activite
 * 
 * @property Collection|Inviter[] $inviters
 * @property Collection|Realiser[] $realisers
 *
 * @package App\Models
 */
class ActiviteCompl extends Model
{
	protected $table = 'activite_compl';
	protected $primaryKey = 'id_activite_compl';
	public $timestamps = false;

	protected $casts = [
		'date_activite' => 'datetime'
	];

	protected $fillable = [
		'date_activite',
		'lieu_activite',
		'theme_activite',
		'motif_activite'
	];

	public function inviters()
	{
		return $this->hasMany(Inviter::class, 'id_activite_compl');
	}

	public function realisers()
	{
		return $this->hasMany(Realiser::class, 'id_activite_compl');
	}
}
