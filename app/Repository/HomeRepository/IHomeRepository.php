<?php
namespace App\Repository\HomeRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IHomeRepository extends IBaseRepository
{
    public function getAllPaginated($search);
}
