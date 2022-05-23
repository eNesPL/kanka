<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @method static self|Builder sort(array $filters, array $defaultOrder = [])
 * @method static self|Builder defaultOrder()
 */
trait SortableTrait
{
    /**
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function scopeSort(Builder $query, array $filters, array $defaultOrder = [])
    {
        if (empty($filters)) {
            if (empty($defaultOrder)) {
                return $query->defaultOrder();
            }
            foreach ($defaultOrder as $field => $order) {
                $query->orderBy($field, $order);
            }
            return $query;
        }

        if (empty($this->sortable)) {
            return $query;
        }

        if (empty($filters['k'])) {
            return $query;
        }

        $key = Arr::get($filters, 'k');
        if (!in_array($key, $this->sortable)) {
            return $query;
        }

        // Force the order to be valid
        $order = strtolower(Arr::get($filters, 'o', 'asc'));
        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'asc';
        }

        if (Str::contains($key, '.')) {
            $segments = explode('.', $key);
            if (count($segments) == 2) {
                return $query->sortOnForeign($key, $order);
            }
        }

        // Custom sort method?
        $custom = 'scopeCustomSort' . ucfirst($key);
        if (method_exists($this, $custom)) {
            return $query->{'customSort' . ucfirst($key)}($order);
        }

        return $query->orderBy($key, $order);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeDefaultOrder(Builder $query)
    {
        if (!isset($this->defaultSort)) {
            return $query;
        }

        $defaults = is_array($this->defaultSort) ? $this->defaultSort : [$this->defaultSort];
        foreach ($defaults as $default) {
            if (is_array($default)) {
                $key = array_key_first($default);
                $query->orderBy($key, $default[$key]);
                continue;
            }
            $query->orderBy($default);
        }
        return $query;
    }

    /**
     * Sort on a foreign relation
     * @param Builder $query
     * @param string $key
     * @param string $order
     * @return Builder
     */
    protected function scopeSortOnForeign(Builder $query, string $key, string $order)
    {
        $segments = explode('.', $key);
        $relationName = $segments[0];

        // Querying a pivot table? Let's let the other query builder take care of this.
        if ($relationName === 'pivot') {
            return $query;
        }
        $relation = $this->{$relationName}();
        $foreignName = $relation->getQuery()->getQuery()->from;
        return $query
            ->select($this->getTable() . '.*')
            ->leftJoin(
                $foreignName . ' as f',
                'f.id',
                $this->getTable() . '.' . $relation->getForeignKeyName()
            )
            ->orderBy(str_replace($relationName, 'f', $key), $order);
    }
}