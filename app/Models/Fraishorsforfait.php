<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fraishorsforfait
 * 
 * @property int $id_fraishorsforfait
 * @property int $id_frais
 * @property Carbon|null $date_fraishorsforfait
 * @property float|null $montant_fraishorsforfait
 * @property string|null $lib_fraishorsforfait
 * 
 * @property Frai $frai
 *
 * @package App\Models
 */
class Fraishorsforfait extends Model
{
	protected $table = 'fraishorsforfait';
	protected $primaryKey = 'id_fraishorsforfait';
	public $timestamps = false;

	protected $casts = [
		'id_frais' => 'int',
		'date_fraishorsforfait' => 'datetime',
		'montant_fraishorsforfait' => 'float'
	];

	protected $fillable = [
		'id_frais',
		'date_fraishorsforfait',
		'montant_fraishorsforfait',
		'lib_fraishorsforfait'
	];

	public function frai()
	{
		return $this->belongsTo(Frai::class, 'id_frais');
	}
}
