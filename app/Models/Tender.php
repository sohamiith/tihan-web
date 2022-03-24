<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"description",
		"start_date",
		"end_date",
		"document",
		"updated_at",
		"created_at"
    ];
}