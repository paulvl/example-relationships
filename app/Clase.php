<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
	protected $hidden = [
		'pivot'
	];

	protected $with = [
		//'teacher'
	];


	public function teacher()
	{
		return $this->belongsTo(User::class, 'teacher_id');
	}

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

}
