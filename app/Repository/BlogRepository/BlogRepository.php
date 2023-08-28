<?php
namespace App\Repository\BlogRepository;

use App\Models\Blog;
use App\Repository\BaseRepository\BaseRepository;

class BlogRepository extends BaseRepository implements IBlogRepository
{
    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }

    public function getAllPaginated($search)
    {
        if ($search != null)
        {
            return $this->model->where('title','LIKE','%'.$search.'%')->paginate(4);
        }

        return $this->model->orderBy('id', 'desc')->paginate(4);
    }
}
