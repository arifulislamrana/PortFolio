<?php
namespace App\Repository\ServiceRepository;

use App\Models\Service;
use App\Repository\BaseRepository\BaseRepository;

class ServiceRepository extends BaseRepository implements IServiceRepository
{
    public function __construct(Service $model)
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
