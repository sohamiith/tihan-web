<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"description",
		"release_date",
		"document",
		"file_name",
		"link",
		"updated_at",
		"created_at"
    ];
}