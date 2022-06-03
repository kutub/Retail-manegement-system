<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Items extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'items.name' => 10,
            'items.generic' => 10,
            'items.product_id' => 5,
            'items.tags' => 2,
        ]
    ];

    protected $fillable = ['name','generic', 'category_id', 'supplier_id', 'upc_ean_isbn', 'product_id', 'additional_item_no', 'tags', 'manufacturer', 'description', 'is_service', 'allow_alt_description', 'item_has_serial_number', 'disable_loyalty', 'created_by','updated_by', 'brand', 'year', 'parts_no'];

    public function attribute(){
        return $this->belongsToMany(Attribute::class)->withTimestamps();
    }

    public function pricing(){
        return $this->hasOne(Pricing::class);
    }

    public function inventory(){
        return $this->hasOne(Inventory::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }

    public function location(){
        return $this->hasOne(Location::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function quote(){
        return $this->hasOne(Quote::class);
    }
}
