<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Http\Requests\StoreAndUpdateDashboard;
use App\Repositories\DashboardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Dashboard::class, 'dashboard');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->dashboards;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function store(StoreAndUpdateDashboard $request, DashboardRepository $repository)
    {
        $data = $request->validated();
        $data['owner_id'] = auth()->user()->id;

        return $repository->store($data);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Dashboard $dashboard
     *
     * @return Dashboard
     */
    public function show(Dashboard $dashboard)
    {
        return $dashboard;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Dashboard $dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdateDashboard $request, Dashboard $dashboard, DashboardRepository $repository)
    {
        return $repository->update($dashboard, $request->validated());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Dashboard $dashboard
     *
     */
    public function destroy(Dashboard $dashboard, DashboardRepository $repository): void
    {
        $repository->delete($dashboard);
    }
}
