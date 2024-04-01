<?php

namespace App\DataTables;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ManufacturerDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($manufacturer) {
                return "<span><a href='". url('manufacturer/'. $manufacturer->id .'/edit') ."'>Edit</a> &nbsp <a href='". url('manufacturer/'. $manufacturer->id.'/delete') ."'>Delete</a></span>";
            })
            ->addColumn('image', function ($equipment) {
                return "<img src='". url($equipment->getImage()) ."' alt='equipment' style='width:50px;'>";
            })
            ->setRowId('id')
            ->rawColumns(['action', 'image']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Manufacturer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    protected array $actions = ['print', 'excel', 'myCustomAction'];

    public function html(): HtmlBuilder
    {
        
        return $this->builder()
                    ->setTableId('manufacturers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    public function myCustomAction()
    {
        name: 'add';
        className: 'buttons-add btn-success';
        text: '<i class="fa fa-plus"></i> New';
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::computed('image')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('description'),
            Column::make('address'),
            Column::make('contact'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Manufacturer_' . date('YmdHis');
    }
}
