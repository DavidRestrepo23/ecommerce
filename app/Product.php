<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'reference', 'price', 'price_tax', 'summary',
        'description', 'status', 'stock', 'meta_keywords', 'meta_description',
        'category_id', 'supplier_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function shopping_carts()
    {
        return $this->belongsToMany(ShoppingCart::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_categories()
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function promotion()
    {
        return $this->hasOne(Promotion::class);
    }

    public function price_specifics()
    {
        return $this->hasMany(PriceSpecific::class);
    }

    public function feature_details()
    {
        return $this->belongsToMany(FeatureDetail::class);
    }

    public function attribute_details()
    {
        return $this->belongsToMany(AttributeDetail::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function combinations()
    {
        return $this->hasMany(ProductCombination::class);
    }


    //Accessors
    public function getFirstImageAttribute()
    {
        return $this->images()->first();
    }

    public function getPriceTaxIncludeAttribute()
    {
        if ($this->price_tax == '0') {
            return $this->price;
        }

        return $this->price_tax;
    }

}
