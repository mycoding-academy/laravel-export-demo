<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;

class Customer extends Model
{
    use HasFactory, Searchable;

    protected $searchUsing = ['first_name', 'last_name'];
    
    public $fillable = [
        'first_name', 'last_name', 'is_active'
    ];
}
