<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $fillable=['parent_id','name','slug','image','description','status'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d G:i:s',
    ];
    public function Parent(){
        return $this->hasOne(Category::class);
    }
}
