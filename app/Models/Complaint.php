<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'anonymous',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'phone',
        'complainanttype',
        'allegetype',
        'reported',
        'description',
        'detail',
        'threat',
        'evidence',
        'datefrom',
        'dateto',
        'wid',
        'nid',
        'nopossession',
        'user_id',
        'complaintno'
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    public function docs()
    {
        return $this->hasMany(\App\Models\Doc::class);
    }

    public function getRouteKeyName()
    {
        return 'user_id';
    }
}
