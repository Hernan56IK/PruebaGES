<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'nit', 'phone', 'address', 'email', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
