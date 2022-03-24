<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"start_date",
		"end_date",
		"document",
		"link",
		"updated_at",
		"created_at"
    ];
}