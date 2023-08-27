<?php
namespace App\Repository\ProjectRepository;

use App\Models\Project;
use App\Repository\BaseRepository\BaseRepository;

class ProjectRepository extends BaseRepository implements IProjectRepository
{
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    public function getAllPaginated($search)
    {
        if ($search != null)
        {
            return $this->model->where('name','LIKE','%'.$search.'%')->paginate(3);
        }

        return $this->model->orderBy('id', 'desc')->paginate(4);
    }
}
