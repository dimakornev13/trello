<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\DashboardUser;
use App\Http\Requests\StoreAndUpdateDashboard;
use App\Repositories\DashboardRepository;
use App\Services\DashboardService;
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
        $user = auth()->user();

        return DashboardService::getUserDashboards($user);
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
     * @param DashboardRepository $repository
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
     * @param DashboardRepository $repository
     */
    public function destroy(Dashboard $dashboard, DashboardRepository $repository): void
    {
        $repository->delete($dashboard);
    }
}
