<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;
class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','lastname'];
    public function phone()
    {
        return $this->belongsTo(Phone::class);
    } 
}
