<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"event_date",
		"file1",
		"url1",
		"file2",
		"url2",
		"file3",
		"url3",
		"file4",
		"url4",
		"updated_at",
		"created_at"
    ];
}