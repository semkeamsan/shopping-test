<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public $validation;
    protected $casts = [
        'images' => 'collection',
        'downloads' => 'collection',
    ];
    public function __construct(array $attributes = []) {
        $this->validation = new ProductFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }
    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }
    public function translation($locale = null)
    {
        if ($locale == null) {
            $locale = app()->getLocale();
        }
        $translation = $this->translations->where('locale', $locale);
        if ($translation->count()) {
            return $translation->first();
        }
        return new ProductTranslation;
    }
    public function meta()
    {
        return  $this->hasOne(Meta::class, 'entity_id')->where('entity',self::class);
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function options()
    {
        return $this->belongsToMany(Option::class, ProductOption::class);
    }
    public function related()
    {
        return $this->belongsToMany(self::class,RelatedProduct::class,'product_id','related_product_id');
    }

    public function categories()
    {
        return $this->belongsToMany( Category::class,ProductCategory::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, ProductTag::class);
    }
}
