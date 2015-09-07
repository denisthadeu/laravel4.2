<?php

class Produtos extends Eloquent {

	protected $table = 'produtos';

	public function user()
	{
		return $this->belongsTo('User');
	}
}