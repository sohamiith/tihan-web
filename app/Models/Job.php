<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"description",
		"document",
		"link",
		"updated_at",
		"created_at"
    ];
}