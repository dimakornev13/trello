<?php

namespace App\Http\Controllers;

use App\Column;
use App\Dashboard;
use App\Http\Requests\ColumnSort;
use App\Http\Requests\StoreAndUpdateColumn;
use App\Repositories\ColumnRepository;
use Illuminate\Support\Facades\Gate;

class ColumnController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Column::class, 'column');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAndUpdateColumn $request
     * @param ColumnRepository $repository
     *
     * @return Column
     */
    public function store(StoreAndUpdateColumn $request, ColumnRepository $repository): Column
    {
        $data = $request->validated();

        return $repository->store($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param StoreAndUpdateColumn $request
     * @param \App\Column $column
     * @param ColumnRepository $repository
     *
     * @return mixed
     */
    public function update(StoreAndUpdateColumn $request, Column $column, ColumnRepository $repository)
    {
        return $repository->update($column, $request->validated());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Column $column
     * @param ColumnRepository $repository
     */
    public function destroy(Column $column, ColumnRepository $repository): void
    {
        $repository->delete($column);
    }


    /**
     * @param ColumnSort $request
     * @param Dashboard $dashboard
     * @param ColumnRepository $repository
     */
    public function sort(ColumnSort $request, Dashboard $dashboard, ColumnRepository $repository){
        Gate::authorize('sort', [Dashboard::class, $dashboard]);

        $repository->sort($dashboard, $request->validated());

    }
}
