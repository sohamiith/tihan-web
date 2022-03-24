<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"lecture_date",
		"speaker",
		"designation",
		"org",
		"updated_at",
		"created_at"
    ];
}