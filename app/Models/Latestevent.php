<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latestevent extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"event_date",
		"file",
		"url",
		"doc",
		"updated_at",
		"created_at"
    ];
}