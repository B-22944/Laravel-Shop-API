<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    //This field is kept in fillable because it should be filled in database.
    protected $fillable = ['name'];

    //relationship
    public function product(){
        //This means that the category has many products.
        return $this->hasMany(Product::class);
    }
}
