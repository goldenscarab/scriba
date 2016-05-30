<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
	 * [users - Relation de plusieurs Notes pouvant être consultées par 1 Utilisateur 'bolongsTo']
	 * @return [Relation] [Illuminate\Database\Eloquent\Relations\bolongsTo]
	 */
	public function user()
	{
	    return $this->belongsTo('App\Models\user');
	}

	public function scopeUserId($query, $id)
	{
		return $query->where('user_id', $id);
	}

	public function scopeType($query, $type)
	{
		return $query->where('type', $type);
	}

	public function scopeSearch($query, $search)
	{
		return $query
			->where('name', 'LIKE', '%'.$search.'%')
			->orWhere('content', 'LIKE','%'.$search.'%')
			->orWhere('author', 'LIKE','%'.$search.'%')
			->orWhere('subject', 'LIKE','%'.$search.'%')
			->orWhere('language', 'LIKE','%'.$search.'%');
	}
	public function scopeSelectForExport($query)
	{
		return $query
			->select('type', 'name', 'content', 'author', 'subject', 'language', 'created_at', 'updated_at');
	}
}
