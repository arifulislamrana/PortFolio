<?php
namespace App\Repository\ResumeRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IResumeRepository extends IBaseRepository
{
    public function getAllPaginated($search);
}
