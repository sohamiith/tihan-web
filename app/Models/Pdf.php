<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;
    protected $fillable = [
    	"roll_no",
		"full_name",
		"personal_email",
		"institute",
		"phone",
		"department",
		"program",
		"first_guide",
		"second_guide",
		"date_of_joining",
		"research_domain",
		"project_title",
		"tenure",
		"fellowship",
		"profile_url",
		"photo",
		"active",
		"updated_at",
		"created_at"
    ];
}
