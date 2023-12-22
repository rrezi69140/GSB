<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Interagir
 * 
 * @property int $id_medicament
 * @property int $med_id_medicament
 * 
 * @property Medicament $medicament
 *
 * @package App\Models
 */
class Interagir extends Model
{
	protected $table = 'interagir';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_medicament' => 'int',
		'med_id_medicament' => 'int'
	];

	public function medicament()
	{
		return $this->belongsTo(Medicament::class, 'med_id_medicament');
	}
}
