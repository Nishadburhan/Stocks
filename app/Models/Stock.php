<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable=['sku', 'office', 'das', 'zero_one', 'zero_two', 'techmate','totalStock', 'status', 'otherSalesRate', 'PurchaseRate'];
}
