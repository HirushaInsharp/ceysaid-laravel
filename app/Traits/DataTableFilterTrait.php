<?php

namespace App\Traits;

Trait DataTableFilterTrait {

    public static function scopeFilterSearchValue($query, $searchKeys = [], $searchValue = null)
    {
        if (!empty($searchValue)) {
            $status = false;
            $i = 0;

            if (in_array('status', $searchKeys)) {
                $status = false;
                unset($searchKeys['status']);
            }

            foreach ($searchKeys as $value) {
                if ($i == 0) {
                    $query->where($value, 'like', '%' . $searchValue . '%');
                } else {
                    $query->orWhere($value, 'like', '%' . $searchValue . '%');
                }
                $i++;
            }

            if ($status) {
                if (str_contains('active', $searchValue) || str_contains('Active', $searchValue)) {
                    $query->orWhere('status', 1);
                }

                if (str_contains('inactive', $searchValue) || str_contains('Inactive', $searchValue)) {
                    $query->orWhere('status', 0);
                }
            }
        }

        return $query;
    }

    public static function scopeOrderValue($query, $orderColumn, $orderDir)
    {
        if (!empty($orderColumn)) {
            $query->orderBy($orderColumn, $orderDir);
        }

        return $query;
    }
}
