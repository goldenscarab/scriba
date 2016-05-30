<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [note Relation de un note consultant plusieurs note 'hasMany']
     * @return [Relation] [Illuminate\Database\Eloquent\Relations\hasMany]
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    public function scopeAllAccess($query)
    {
        return $query->where('admin', true);
    }
}
