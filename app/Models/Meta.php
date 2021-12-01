<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meta extends Model
{
    use HasFactory;
    public function __construct(array $attributes = []) {
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }
    public function translations()
    {
        return $this->hasMany(MetaTranslation::class);
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
        return new MetaTranslation;
    }
}
