<?php
/**
 * Created by PhpStorm.
 * User: bkanber
 * Date: 11/1/14
 * Time: 1:08 PM
 */

use Carbon\Carbon;

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

	/**
	 * Methods
	 */

	public function describe()
	{
		$output = "The {$this->name} Guild was formed {$this->howOld()} in the age of the Oyster.\n"
			. "The Guild boasts " . count($this->members()) . " member and has completed X quests.";
		// Todo: count quests.
		return $output;
	}

	public function howOld()
	{
		return str_replace('before', 'ago', $this->created_at->diffForHumans(Carbon::now()));
	}

	/**
	 * Accessors
	 */

	public function getNameAttribute($value)
	{
		return ucwords($value);
	}
}