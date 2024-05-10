<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User ;

class Dealer extends User
{
    use HasFactory;
    protected $fillable = [
        'billing_company_name',
        'billing_company_type',
        'billing_entity_type',
        'billing_firstname',
        'billing_lastname',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_zipcode',

    ];

}
