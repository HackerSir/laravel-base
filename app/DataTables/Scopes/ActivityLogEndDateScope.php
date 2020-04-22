<?php

namespace App\DataTables\Scopes;

use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ActivityLogEndDateScope implements DataTableScope
{
    /**
     * @var Carbon
     */
    private $endDate;

    /**
     * ActivityLogEndDateScope constructor.
     * @param Carbon $endDate
     */
    public function __construct(Carbon $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('created_at', '<=', $this->endDate->endOfDay());
    }
}
