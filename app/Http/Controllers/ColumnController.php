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

    private $repository;

    public function __construct(ColumnRepository $repository)
    {
        $this->authorizeResource(Column::class, 'column');

        $this->repository = $repository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAndUpdateColumn $request
     *
     * @return Column
     */
    public function store(StoreAndUpdateColumn $request): Column
    {
        $data = $request->validated();

        return $this->repository->store($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param StoreAndUpdateColumn $request
     * @param \App\Column $column
     *
     * @return mixed
     */
    public function update(StoreAndUpdateColumn $request, Column $column)
    {
        $form_data = $request->validated();

        $column->update($form_data);

        return $column;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Column $column
     */
    public function destroy(Column $column): void
    {
        $column->delete();
    }


    /**
     * @param ColumnSort $request
     * @param Dashboard $dashboard
     */
    public function sort(ColumnSort $request, Dashboard $dashboard){
        Gate::authorize('sort', [Dashboard::class, $dashboard]);

        $this->repository->sort($dashboard, $request->validated());

    }
}
