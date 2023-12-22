<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dosage
 * 
 * @property int $id_dosage
 * @property int|null $qte_dosage
 * @property string|null $unite_dosage
 * 
 * @property Collection|Prescrire[] $prescrires
 *
 * @package App\Models
 */
class Dosage extends Model
{
	protected $table = 'dosage';
	protected $primaryKey = 'id_dosage';
	public $timestamps = false;

	protected $casts = [
		'qte_dosage' => 'int'
	];

	protected $fillable = [
		'qte_dosage',
		'unite_dosage'
	];

	public function prescrires()
	{
		return $this->hasMany(Prescrire::class, 'id_dosage');
	}
}
