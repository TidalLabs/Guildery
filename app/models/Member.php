<?php
/**
 * Created by PhpStorm.
 * User: bkanber
 * Date: 11/1/14
 * Time: 1:32 PM
 */

class Member extends Eloquent
{
	protected $fillable = ['name', 'slack_id'];
	protected $guarded = ['id'];

	/**
	 * Relationships
	 */

	public function guilds()
	{
		$this->belongsToMany('Guild')->withTimestamps();
	}
} 