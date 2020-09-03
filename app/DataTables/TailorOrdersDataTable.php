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
class TailorOrdersDataTable extends DataTable
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
                    case "cancelled":
                        $class = "bg-danger";
                        break;
                    case "recieved":
                        $class = "bg-info";
                        break;    
                    default:
                        $class = "bg-warning";
                }

                return '<span class="badge '.$class.'">'.strtolower($query->status).'</span>';
            })
            ->addColumn('customer_name', function ($query){

                return Helper::userIdToName($query->customer_id);   
            })
           ->addColumn('action', function ($query){
                if($query->status=='pending')
                {
                    return '<a href="/order/'.$query->id.'/accepted" class="btn btn-info" role="button">Accept</a>';                    
                }
                else if($query->status=='accepted')
                {
                     return '<a href="/order/'.$query->id.'/in-progress" class="btn btn-warning" role="button">Stitching</a>'; 
                }
                else if($query->status=='in-progress')
                {
                     return '<a href="/order/'.$query->id.'/dispatched" class="btn btn-success" role="button">Dispatch</a>'; 
                }
                else if($query->status=='dispatched')
                {
                    $class = "bg-success";
                     return '<span class="badge '.$class.'">'.'Order Dispatched Successfully'.'</span>';
                }
                else if($query->status=='cancelled')
                {
                    $class = "bg-danger";
                     return '<span class="badge '.$class.'">'.'Order Cancelled Successfully'.'</span>';
                }
                else if($query->status=='recieved')
                {
                    $class = "bg-info";
                     return '<span class="badge '.$class.'">'.'Order Recieved Successfully'.'</span>';
                }
                

            })
           ->addColumn('cancel_order', function ($query){
                if($query->status =='pending')
                {
                 return '<a href="/order/'.$query->id.'/cancelled" class="btn btn-danger" role="button">Cancel</a>';    
                }
                else if($query->status !='pending')
                {
                    return '<button class="btn btn-default" disabled="disabled">Cancel</button>';      
                }
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\TailorOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        // $ordes= Order::where('tailor_id',Auth::user()->id)->where('')
        return $model->newQuery()
                ->select("order")
                ->join("users" , "order.tailor_id", "=", "users.id")
                ->where('users.id',Auth::user()->id)
                ->where('users.type','=','tailor')
                ->select('order.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('tailororders-table')
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
            Column::make('customer_name'),
            Column::make('status'),
            Column::make('start_date'),
            Column::make('end_date'),
             // Column::make('stage'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120),
            Column::make('cancel_order'),      
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TailorOrders_' . date('YmdHis');
    }
}
