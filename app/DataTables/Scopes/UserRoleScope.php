<?php

namespace App\DataTables\Scopes;

use App\Role;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Contracts\DataTableScope;

class UserRoleScope implements DataTableScope
{
    /**
     * @var Role
     */
    private $role;

    /**
     * UserRoleScope constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->whereHas('roles', function ($query) {
            /** @var Builder|Role $query */
            return $query->where('name', $this->role->name);
        });
    }
}
