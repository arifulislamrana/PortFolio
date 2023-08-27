<?php
namespace App\Repository\ResumeRepository;

use App\Models\Resume;
use App\Repository\BaseRepository\BaseRepository;

class ResumeRepository extends BaseRepository implements IResumeRepository
{
    public function __construct(Resume $model)
    {
        parent::__construct($model);
    }

    public function getAllPaginated($search)
    {
        if ($search != null)
        {
            return $this->model->where('degree_name','LIKE','%'.$search.'%')->paginate(3);
        }

        return $this->model->orderBy('id', 'desc')->paginate(4);
    }
}
