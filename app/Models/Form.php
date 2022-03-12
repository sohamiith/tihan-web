<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"file",
		"updated_at",
		"created_at"
    ];
}
