<?php

namespace App\Modules\Invoices\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function total(): int
    {
        return $this->price * $this->pivot->quantity;
    }
}
