<?php

namespace App\DataTables\Scopes;

use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ActivityLogStartDateScope implements DataTableScope
{
    /**
     * @var Carbon
     */
    private $startDate;

    /**
     * ActivityLogStartDateScope constructor.
     * @param Carbon $startDate
     */
    public function __construct(Carbon $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('created_at', '>=', $this->startDate->startOfDay());
    }
}
