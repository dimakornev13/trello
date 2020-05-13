<?php


namespace App\Repositories;


use App\Column;
use App\Dashboard;
use Illuminate\Support\Facades\DB;

class ColumnRepository
{

    private $data;


    /**
     * @param array $data
     *
     * @return Column
     */
    public function store(array $data): Column
    {
        $this->data = $data;

        $this->setSort();

        $column = Column::create($this->data);

        return $column;
    }


    /**
     * get maximum sort field for specific dashboard and set it up for new Column
     */
    private function setSort()
    {
        $this->data['sort'] = Column::where('dashboard_id', $this->data['dashboard_id'])->max('sort');
    }


    public function update(Column $column, array $data)
    {
        $column->update($data);

        return $column;
    }


    public function delete(Column $column)
    {
        $column->delete();
    }


    /**
     * update sort field for columns from one dashboard just
     *
     * @param Dashboard $dashboard
     * @param array $form_data
     */
    public function sort(Dashboard $dashboard, array $form_data)
    {
        // update %table where (case WHEN id = %d then %d ... end)
        $case = collect($form_data['set'])->map(function ($id, $index) {
            return sprintf('WHEN id = %d THEN %d', $id, $index);
        })->implode(' ');

        $case = sprintf('(case %s end)', $case);

        DB::table((new Column())->getTable())
            ->where('dashboard_id', $dashboard->id)
            ->whereIn('id', $form_data['set'])
            ->update(['sort' => DB::raw($case)]);
    }
}
