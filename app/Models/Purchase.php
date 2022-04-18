<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"purchase_date",
		"updated_at",
		"created_at"
    ];
}