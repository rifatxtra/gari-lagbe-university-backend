<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table='customers'; //name of the table from database
    protected $primaryKey='customer_id'; //primary key of the table from database
    protected $fillable=[ //column name that can be updated or changed
        'customer_name',
        'customer_email',
        'customer_password'
    ];
    protected $hidden=['customer_password']; //hide column white returning full data
    public $timestamps=true; //enable created_at and updated_at auto manupulation ny laravel
}
