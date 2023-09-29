<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TaskFilter extends AbstractFilter
{

    public const MY_TASKS = 'my_tasks';
    public const SIMPLE = '';


    protected function getCallbacks(): array
    {
        return [
            self::MY_TASKS => [$this, 'myTasks'],
        ];
    }

    public function myTasks(Builder $builder, $value)
    {
        $builder->select()->
        from('purchase_order_tasks')->
        where('employee_id', '=', auth()->user()->id);
    }

    public function before(Builder $builder)
    {

        switch (auth()->user()->role->id) {
            case 3:
                $builder->select(DB::raw('purchase_order_tasks.id, employee_id, started_at, ended_at, status_id, purchase_orders.id AS purchase_order_id'))
                    ->join('purchase_orders', 'purchase_orders.id', '=', 'purchase_order_tasks.purchase_order_id')
                    ->whereBetween('status_id', [2, 3]);
                break;
            case 4:
                $builder->select(DB::raw('purchase_order_tasks.id, employee_id, started_at, ended_at, status_id, purchase_orders.id AS purchase_order_id'))
                    ->join('purchase_orders', 'purchase_orders.id', '=', 'purchase_order_tasks.purchase_order_id')
                    ->whereBetween('status_id', [4, 6])
                    ->where('ended_at', null);
                break;
            case 5:
            case 2:
                $builder->select(DB::raw('purchase_order_tasks.id, employee_id, started_at, ended_at, status_id, purchase_orders.id AS purchase_order_id'))
                    ->join('purchase_orders', 'purchase_orders.id', '=', 'purchase_order_tasks.purchase_order_id')
                    ->whereBetween('status_id', [2, 6])
                    ->where('ended_at', null);
        }
    }
}
