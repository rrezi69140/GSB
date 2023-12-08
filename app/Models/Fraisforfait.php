<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fraisforfait
 * 
 * @property int $id_fraisforfait
 * @property string|null $lib_fraisforfait
 * @property float|null $montant_frais_forfait
 * 
 * @property Collection|LigneFraisforfait[] $ligne_fraisforfaits
 *
 * @package App\Models
 */
class Fraisforfait extends Model
{
	protected $table = 'fraisforfait';
	protected $primaryKey = 'id_fraisforfait';
	public $timestamps = false;

	protected $casts = [
		'montant_frais_forfait' => 'float'
	];

	protected $fillable = [
		'lib_fraisforfait',
		'montant_frais_forfait'
	];

	public function ligne_fraisforfaits()
	{
		return $this->hasMany(LigneFraisforfait::class, 'id_fraisforfait');
	}
}
