<?php

namespace App\Models;

//use App\Models\Product;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanelProduct extends Product
{
    //use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        //static::addGlobalScope(new AvailableScope);
    }
}
