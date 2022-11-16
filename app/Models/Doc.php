<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Doc
 * @package App\Models
 * @version August 21, 2021, 6:14 pm UTC
 *
 * @property integer $id
 * @property string $orig_name
 * @property string $filename
 * @property string $lastchangeby
 * @property string|\Carbon\Carbon $lastchangedate
 */
class Doc extends Model
{
    use HasFactory;
    public $table = 'docs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'orig_name',
        'filename',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'complaint_id' => 'integer',
        'orig_name' => 'string',
        'filename' => 'string',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'orig_name' => 'nullable|string|max:255',
        'filename' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function complaint()
    {
        return $this->belongsTo(\App\Models\Complaint::class, 'complaint_id');
    }
}
