<?php
namespace App\Repository\SkillRepository;

use App\Models\Skill;
use App\Repository\BaseRepository\BaseRepository;

class SkillRepository extends BaseRepository implements ISkillRepository
{
    public function __construct(Skill $model)
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
