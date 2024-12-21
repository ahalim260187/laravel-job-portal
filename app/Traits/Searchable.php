<?php

namespace App\Traits;

use function Laravel\Prompts\search;

trait Searchable
{
    function search($query, array $searchableFields)
    {
        if (request()->has('search')) {
            return $query->where(function ($subQuery) use ($searchableFields) {
                foreach ($searchableFields as $field) {
                    $subQuery->orWhere(
                        $field,
                        'like',
                        '%' . request('search') . '%'
                    );
                }
            });
        }
        return;
    }
}
