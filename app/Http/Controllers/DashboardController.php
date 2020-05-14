<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Http\Requests\StoreAndUpdateDashboard;
use App\Repositories\DashboardRepository;
use App\Services\DashboardService;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{

    private $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->authorizeResource(Dashboard::class, 'dashboard');

        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DashboardService::getUserDashboards(auth()->user());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function store(StoreAndUpdateDashboard $request)
    {
        $data = $request->validated();
        $data['owner_id'] = auth()->user()->id;

        return $this->repository->store($data);
    }


    /**
     * Display the specified resource.
     *
     * @param Dashboard $dashboard
     *
     * @return JsonResponse
     */
    public function show(Dashboard $dashboard)
    {
        return response()->json($dashboard->columns);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param StoreAndUpdateDashboard $request
     * @param \App\Dashboard $dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdateDashboard $request, Dashboard $dashboard)
    {
        return $this->repository->update($dashboard, $request->validated());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Dashboard $dashboard
     */
    public function destroy(Dashboard $dashboard): void
    {
        $this->repository->delete($dashboard);
    }
}
