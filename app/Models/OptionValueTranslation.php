<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionValueTranslation extends Model
{
    use HasFactory;
    public function __construct(array $data = array(),array $attributes = [])
    {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }
}
