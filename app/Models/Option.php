<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\OptionFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    public $validation;
    public function __construct(array $attributes = [])
    {
        $this->validation = new OptionFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }
    public function validate(array $data)
    {
        $validator = Validator::validate($data, $this->validation->rules(@$data['id']), $this->validation->messages(), $this->validation->attributes());
        return $validator;
    }

    public function translations()
    {
        return $this->hasMany(OptionTranslation::class);
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
        return new OptionTranslation;
    }

    public function values()
    {
        return $this->hasMany(OptionValue::class);
    }
}
