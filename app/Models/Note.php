<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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


	public function setNameAttribute($data)
	{
		$this->attributes['name'] = Crypt::encrypt($data);
	}
	public function getNameAttribute()
	{
		// Vérification si la colonne existe au moment de l'appel
		if(isset($this->attributes['name']))
		{
			return Crypt::decrypt($this->attributes['name']);
		}
	}

	public function setContentAttribute($data)
	{
		$this->attributes['content'] = Crypt::encrypt($data);
	}
	public function getContentAttribute()
	{
		// Vérification si la colonne existe au moment de l'appel
		if(isset($this->attributes['content']))
		{
			return Crypt::decrypt($this->attributes['content']);
		}
	}

	public function setSubjectAttribute($data)
	{
		$this->attributes['subject'] = Crypt::encrypt($data);
	}
	public function getSubjectAttribute()
	{
		// Vérification si la colonne existe au moment de l'appel
		if(isset($this->attributes['subject']))
		{
			return Crypt::decrypt($this->attributes['subject']);
		}
	}

}
