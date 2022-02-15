<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    protected $fillable = [
    	"intern_no",
		"full_name",
		"personal_email",
		"institute",
		"role",
		"guide",
		"work_area",
		"phone",
		"date_of_joining",
		"tenure",
		"stipend",
		"profile_url",
		"photo",
		"active",
		"updated_at",
		"created_at",
		"department",
		"qualification"

    ];
}
