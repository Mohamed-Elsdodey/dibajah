<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $appends=['product_attribute_with_values'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImages::class,'product_id');
    }//end fun

    public function getProductAttributeWithValuesAttribute()
    {
        $attributesIds = ProductChosenAttributes::where('product_id',$this->id)
            ->pluck('product_attribute_id')->toArray();

        $attributes = ProductAttribute::wherein('id',$attributesIds)->latest()->get();

        foreach ($attributes as $attribute)
        {
            $query['product_attribute_id'] = $attribute->id;
            $query['product_id'] = $this->id;
            $attribute->values = ProductChosenDataAttributes::where($query)->latest()->get();
        }
        return $attributes;
    }//end fun
    // خصائص المنتج بدون قيم//////////
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product_attributes($id=false)
    {
        return $this->belongsToMany(ProductAttribute::class,'product_chosen_attributes',
            'product_id','product_attribute_id');
    }//end fun

}//end class
