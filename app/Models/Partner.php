<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name','image','link'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_partner';
}
