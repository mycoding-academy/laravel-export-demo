<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait Searchable
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder|static  $query
     * @param string  $keyword
     * @param boolean  $matchAllFields
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeSearch($query, $keyword, $matchAllFields = false)
    {
        return static::where(function ($query) use ($keyword, $matchAllFields) {

            foreach (static::getSearchableFields() as $field) {
                if ($matchAllFields) {
                    $query->where($field, 'LIKE', "%$keyword%");
                } else {
                    $query->orWhere($field, 'LIKE', "%$keyword%");
                }
            }

        });
    }

    /**
     * Get all searchable fields
     *
     * @return array
     */
    public static function getSearchableFields()
    {
        $model = new static;

        // look for defined search fields in model
        // protected $searchUsing = ['name', 'email']; 
        $fields = $model->searchUsing;

        if (empty($fields)) {
            $fields = Schema::getColumnListing($model->getTable());

            $ignoredColumns = [
                $model->getKeyName(),
                $model->getUpdatedAtColumn(),
                $model->getCreatedAtColumn(),
            ];

            if (method_exists($model, 'getDeletedAtColumn')) {
                $ignoredColumns[] = $model->getDeletedAtColumn();
            }

            $fields = array_diff($fields, $model->getHidden(), $ignoredColumns);
        }

        return $fields;
    }
}