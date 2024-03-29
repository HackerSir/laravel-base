<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ActivityLogNameScope implements DataTableScope
{
    private $logName;

    /**
     * ActivityLogNameScope constructor.
     *
     * @param $logName
     */
    public function __construct($logName)
    {
        $this->logName = $logName;
    }

    /**
     * Apply a query scope.
     *
     * @param  \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('log_name', $this->logName);
    }
}
