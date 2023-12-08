<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Travailler
 * 
 * @property int $id_visiteur
 * @property Carbon $jjmmaa
 * @property int $id_region
 * @property string|null $role_visiteur
 * 
 * @property Region $region
 * @property Visiteur $visiteur
 *
 * @package App\Models
 */
class Travailler extends Model
{
	protected $table = 'travailler';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_visiteur' => 'int',
		'jjmmaa' => 'datetime',
		'id_region' => 'int'
	];

	protected $fillable = [
		'role_visiteur'
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'id_region');
	}

	public function visiteur()
	{
		return $this->belongsTo(Visiteur::class, 'id_visiteur');
	}
}
