<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;
    protected $fillable = [
		"seq_no",
		"asset_id",
		"name",
		"category_book",
		"category_fin",
		"identification",
		"life",
		"user",
		"order_date",
		"supplier_name",
		"voucher",
		"cost",
		"discount",
		"receive_date",
		"remaining",
		"days",
		"rate_as_par",
		"updated_at",
		"created_at"
    ];
}