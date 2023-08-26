<?php
namespace App\Repository\HomeRepository;

use App\Models\Home;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\HomeRepository\IHomeRepository;

class HomeRepository extends BaseRepository implements IHomeRepository
{
    public function __construct(Home $model)
    {
        parent::__construct($model);
    }

    public function getAllPaginated($search)
    {
        if ($search != null)
        {
            return $this->model->where('designation','LIKE','%'.$search.'%')->paginate(3);
        }

        return $this->model->orderBy('id', 'desc')->paginate(3);
    }
}
