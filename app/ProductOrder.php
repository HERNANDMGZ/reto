<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{

    public function find($id)
    {
        return Product::where('id', $id)->first();
    }

}
