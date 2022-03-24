<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
		"title",
		"start_date",
		"end_date",
		"document",
		"reg_link",
		"participants",
		"updated_at",
		"created_at"
    ];
}