<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name','price','quantity','status','attribute','created_by','updated_by'
    ];

    function updatedBy(){
        return $this->hasOne(User::class, 'id','updated_by');
    }
}

