<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicament
 * 
 * @property int $id_medicament
 * @property int|null $id_famille
 * @property string|null $depot_legal
 * @property string|null $nom_commercial
 * @property string|null $effets
 * @property string|null $contre_indication
 * @property float|null $prix_echantillon
 * 
 * @property Famille|null $famille
 * @property Collection|Constituer[] $constituers
 * @property Collection|Formuler[] $formulers
 * @property Collection|Interagir[] $interagirs
 * @property Collection|Offrir[] $offrirs
 * @property Collection|Prescrire[] $prescrires
 * @property Collection|StatsPrescription[] $stats_prescriptions
 *
 * @package App\Models
 */
class Medicament extends Model
{
	protected $table = 'medicament';
	protected $primaryKey = 'id_medicament';
	public $timestamps = false;

	protected $casts = [
		'id_famille' => 'int',
		'prix_echantillon' => 'float'
	];

	protected $fillable = [
		'id_famille',
		'depot_legal',
		'nom_commercial',
		'effets',
		'contre_indication',
		'prix_echantillon'
	];

	public function famille()
	{
		return $this->belongsTo(Famille::class, 'id_famille');
	}

	public function constituers()
	{
		return $this->hasMany(Constituer::class, 'id_medicament');
	}

	public function formulers()
	{
		return $this->hasMany(Formuler::class, 'id_medicament');
	}

	public function interagirs()
	{
		return $this->hasMany(Interagir::class, 'med_id_medicament');
	}

	public function offrirs()
	{
		return $this->hasMany(Offrir::class, 'id_medicament');
	}

	public function prescrires()
	{
		return $this->hasMany(Prescrire::class, 'id_medicament');
	}

	public function stats_prescriptions()
	{
		return $this->hasMany(StatsPrescription::class, 'id_medicament');
	}
}
