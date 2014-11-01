<?php
/**
 * Created by PhpStorm.
 * User: bkanber
 * Date: 11/1/14
 * Time: 1:08 PM
 */

class Guild extends Eloquent
{
	protected $fillable = [ 'name' ];
	protected $guarded = [ 'id' ];

	/**
	 * Relationships
	 */

	public function members()
	{
		return $this->belongsToMany('Member')->withTimestamps();
	}
}