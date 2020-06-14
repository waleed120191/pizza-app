<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'price', 'cover_img'];
    /**
     * @var array
     */
    protected $casts = [
        'description' => 'string',
        'name' => 'string',
        'price' => 'float'
    ];
}
