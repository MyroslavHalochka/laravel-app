<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'post_tags';
    protected $guarded = false;
}
