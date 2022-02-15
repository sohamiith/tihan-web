<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;
    protected $fillable = [
    	"seq_no",
    	"emp_id",
		"full_name",
		"designation",
		"phone",
		"email",
		"reporting",
		"date_of_joining",
		"date_of_exit",
		"qualification",
		"tenure",
		"salary",
		"active",
		"updated_at",
		"created_at"
    ];
}
