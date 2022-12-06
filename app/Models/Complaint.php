<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
//use Illuminate\Contracts\Encryption\DecryptException;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'anonymous',
        'firstname',
        'middlename',
        'lastname',
        'contactyou',
        'email',
        'phoneno',
        'complainanttype',
        'allegetype',
        'specify',
        'reported',
        'description',
        'towhom',
        'detail',
        'threat',
        'elaborate',
        'evidence',
        'dateocurred',
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
    protected function firstname(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }
    protected function middlename(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }
    protected function lastname(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }

    protected function phoneno(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }
    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),
            set: fn ($value) => Crypt::encrypt($value),

        );
    }
    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }

    protected function detail(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }

    protected function elaborate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }
    protected function wid(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }
    protected function nid(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? $value : Crypt::decrypt($value),

            set: fn ($value) => Crypt::encrypt($value),
        );
    }
}
