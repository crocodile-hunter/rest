<?php

class Merchant extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'merchant';

	protected $fillable = array('name','url','email');

}