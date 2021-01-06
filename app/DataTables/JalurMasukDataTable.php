<?php

namespace App\DataTables;

use App\Models\JalurMasuk;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JalurMasukDataTable extends DataTable
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
            ->addColumn('action', 'jalurmasukdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\JalurMasukDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = JalurMasuk::select('*');

        return $this->applyScopes($model);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('jalurmasukdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
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
            Column::computed('action')
                  ->exportable(true)
                  ->printable(true)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('nama'),
            Column::make('tahun'),
            Column::make('keterangan'),
            Column::make('periode_buka'),
            Column::make('periode_tutup'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'JalurMasuk_' . date('YmdHis');
    }
}
