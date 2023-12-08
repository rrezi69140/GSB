<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LigneFraisforfait
 * 
 * @property int $id_frais
 * @property int $id_fraisforfait
 * @property int|null $quantite_ligne
 * 
 * @property Frai $frai
 * @property Fraisforfait $fraisforfait
 *
 * @package App\Models
 */
class LigneFraisforfait extends Model
{
	protected $table = 'ligne_fraisforfait';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_frais' => 'int',
		'id_fraisforfait' => 'int',
		'quantite_ligne' => 'int'
	];

	protected $fillable = [
		'quantite_ligne'
	];

	public function frai()
	{
		return $this->belongsTo(Frai::class, 'id_frais');
	}

	public function fraisforfait()
	{
		return $this->belongsTo(Fraisforfait::class, 'id_fraisforfait');
	}
}
