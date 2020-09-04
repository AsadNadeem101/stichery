<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Auth;
use App\Helpers\Helper;

class OrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
            return datatables()
            ->eloquent($query)
            ->editColumn('status',function ($query){

                switch($query->status){
                    case "pending":
                        $class = "bg-warning";
                        break;
                    case "accepted":
                        $class = "bg-success";
                        break;
                    case "in-progress":
                        $class = "bg-secondary";
                        break;
                    case "dispatched":
                        $class = "bg-primary";
                        break;
                    case "recieved":
                        $class = "bg-info";
                        break;    
                    case "cancelled":
                        $class = "bg-danger";
                        break;
                    default:
                        $class = "bg-warning";
                }

                return '<span class="badge '.$class.'">'.strtolower($query->status).'</span>';
            })
            ->addColumn('tailor_name', function ($query){

                return Helper::userIdToName($query->tailor_id);   
            })
            ->addColumn('customer_name', function ($query){

                return Helper::userIdToName($query->customer_id);   
            })
            ->addColumn('product_name', function ($query){

                return Helper::productIdToName($query->product_id);   
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        // $model=Order::all();
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('order-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        // Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('price')
            ->width(20),
            Column::make('tailor_name'),
            Column::make('customer_name'),
            Column::make('product_name'),
            Column::make('size'),
            Column::make('length'),
            Column::make('status'),
            Column::make('start_date'),
            Column::make('end_date'),
             // Column::make('stage'),
            // Column::make('updated_at'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(120),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Order_' . date('YmdHis');
    }
}
