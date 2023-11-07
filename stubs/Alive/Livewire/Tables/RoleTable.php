<?php

namespace Modules\Alive\Livewire\Tables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Enumerable;

use Modules\Alive\Models\AliveRole;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Filters\DateFilter;
use RamonRietdijk\LivewireTables\Actions\Action;


class RoleTable extends LivewireTable
{
    protected string $model = AliveRole::class;

    protected bool $useReordering = true;

    protected string $reorderingColumn = 'id';

    protected function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->sortable(),
            Column::make(__('Name'), 'name')
                ->sortable(),
        ];
    }

    protected function filters(): array
    {
        return [
            DateFilter::make(__('Created At'), 'created_at'),
        ];
    }

    protected function actions(): array
    {
        return [
            Action::make(__('My Action'), 'my_action', function (Enumerable $models): void {
            }),
            Action::make(__('Import'), 'import', function (Enumerable $models): void {
            })->standalone(),
        ];
    }

    public function link(Model $model): ?string
    {
        return route('alive.role.show', $model->ulid);
    }
}
