<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
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
            ->editColumn('status', function ($query){

                if($query->status == 'active'){ $checked = " checked "; }else{  $checked = ""; }
                return '<input type="checkbox"
                            data-toggle="toggle"
                            data-width="145"
                            data-height="30"
                            data-size="small"
                            data-onstyle="success"
                            data-offstyle="danger"
                            class="bt-toggle"
                            data-on="'.'active'.'"
                            data-off="'.'deactivate'.'"
                            data-id="'.$query->id.'"  '.$checked.' onchange="updateUserStatus(this  )"  >';
            })
            ->addColumn('action', 'user.action')
            ->addColumn('delete', function ($query){

            // $return = '<a href="/users/'.$query->id.'/delete"><i class="ml-2 fas fa-trash" style="color: maroon"></i></a>';
                $return = '<a href=""><i class="ml-2 fas fa-trash" style="color: maroon"></i></a>';
            return $return;
            })
            ->escapeColumns([]); 
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Customer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $customer=User::where('type','customer');
        return $customer->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('customer-table')
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
            Column::make('name'),
            Column::make('email'),
            Column::make('status'),            
            Column::make('address'),
            Column::make('phone_no'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('delete'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Customer_' . date('YmdHis');
    }
}
