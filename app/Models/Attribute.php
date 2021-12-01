<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\AttributeFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;
    public $validation;
    public function __construct(array $attributes = [])
    {
        $this->validation = new AttributeFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function translations()
    {
        return $this->hasMany(AttributeTranslation::class);
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
        return new AttributeTranslation;
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function meta()
    {
        return  $this->hasOne(Meta::class, 'entity_id')->where('entity',self::class);
    }
}
