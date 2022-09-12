<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    //These fields are kept in fillable because they should be filled in database.
    protected $fillable = ['image','title','price','description','category_id'];

    //relationship
    public function category()
    {
        //This means that the product belongs to a category.
        return $this->belongsTo(Category::class);
    }
}
