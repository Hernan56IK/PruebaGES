<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'nit', 'phone', 'address', 'email'];

    public function Clients()
    {
        return $this->hasMany(Client::class);
    }
}
