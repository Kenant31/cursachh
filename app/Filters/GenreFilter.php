<?php

// TypeFilter.php

namespace App\Filters;

class GenreFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('genre', $value);
    }
}
