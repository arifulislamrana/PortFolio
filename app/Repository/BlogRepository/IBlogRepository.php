<?php
namespace App\Repository\BlogRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IBlogRepository extends IBaseRepository
{
    public function getAllPaginated($search);
}
