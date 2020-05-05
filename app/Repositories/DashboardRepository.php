<?php


namespace App\Repositories;


use App\Dashboard;
use App\Events\DashboardCreated;
use App\Events\DashboardDeleted;
use Illuminate\Support\Facades\Storage;

class DashboardRepository
{

    /**
     * @param array $data
     *
     * @return Dashboard
     */
    public function store(array $data): Dashboard
    {
        $this->setBackground($data);

        $dashboard = Dashboard::create($data);

        event(new DashboardCreated($dashboard));

        return $dashboard;
    }


    /**
     * set path to background image to fillable fields or set it up empty if not presented
     *
     * @param array $data
     */
    private function setBackground(array &$data)
    {
        $data['background'] = empty($data['background'])
            ? ''
            : '/storage/' . ($data['background'])->store('backgrounds', 'public');
    }


    /**
     * update dsahboard
     *
     * @param Dashboard $dashboard
     * @param array $data
     *
     * @return mixed
     */
    public function update(Dashboard $dashboard, array $data)
    {
        if (!empty($dashboard->background) && !empty($data['background']))
            $this->deleteOldBackground($dashboard);

        $this->setBackground($data);

        $dashboard->update($data);

        return $dashboard;
    }


    private function deleteOldBackground(Dashboard $dashboard)
    {
        if(empty($dashboard->background))
            return;

        Storage::disk('public')->delete($dashboard->background);
    }


    /**
     * delete dashboard
     *
     * @param Dashboard $dashboard
     */
    public function delete(Dashboard $dashboard){
        $this->deleteOldBackground($dashboard);

        $dashboard->delete();

        event(new DashboardDeleted($dashboard));
    }
}
