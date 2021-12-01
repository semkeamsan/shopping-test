<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    public $validation;
    protected $with = ['meta'];
    public function __construct(array $attributes = [])
    {
        $this->validation = new BrandFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function translations()
    {
        return $this->hasMany(BrandTranslation::class);
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
        return new BrandTranslation;
    }

    public function meta()
    {
        return  $this->hasOne(Meta::class, 'entity_id')->where('entity',self::class);
    }
}
