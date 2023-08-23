<?php

namespace App\Modules\Invoices\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'invoice_product_lines')->withPivot('quantity');
    }

    public function total(): int
    {
        $result = 0;
        foreach ($this->products ?: [] as $product) {
            $result += $product->total();
        }

        return $result;
    }
}
