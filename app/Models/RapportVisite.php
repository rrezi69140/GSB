<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RapportVisite
 * 
 * @property int $id_rapport
 * @property int|null $id_praticien
 * @property int $id_visiteur
 * @property Carbon|null $date_rapport
 * @property string|null $bilan
 * @property string|null $motif
 * 
 * @property Praticien|null $praticien
 * @property Visiteur $visiteur
 * @property Collection|Offrir[] $offrirs
 *
 * @package App\Models
 */
class RapportVisite extends Model
{
	protected $table = 'rapport_visite';
	protected $primaryKey = 'id_rapport';
	public $timestamps = false;

	protected $casts = [
		'id_praticien' => 'int',
		'id_visiteur' => 'int',
		'date_rapport' => 'datetime'
	];

	protected $fillable = [
		'id_praticien',
		'id_visiteur',
		'date_rapport',
		'bilan',
		'motif'
	];

	public function praticien()
	{
		return $this->belongsTo(Praticien::class, 'id_praticien');
	}

	public function visiteur()
	{
		return $this->belongsTo(Visiteur::class, 'id_visiteur');
	}

	public function offrirs()
	{
		return $this->hasMany(Offrir::class, 'id_rapport');
	}
}
