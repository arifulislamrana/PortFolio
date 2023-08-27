<?php
namespace App\Repository\ProjectRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IProjectRepository extends IBaseRepository
{
    public function getAllPaginated($search);
}
