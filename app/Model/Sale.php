<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $table = 'sales';
    protected $fillable = [
        'name','product_id','quantity','status','created_by','updated_by'
    ];
    function createdBy(){
        return $this->hasOne(User::class, 'id','created_by');
    }
    function productName(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    function updatedBy(){
        return $this->hasOne(User::class, 'id','updated_by');
    }

}

