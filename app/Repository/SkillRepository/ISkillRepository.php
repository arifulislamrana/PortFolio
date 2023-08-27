<?php
namespace App\Repository\SkillRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface ISkillRepository extends IBaseRepository
{
    public function getAllPaginated($search);
}
