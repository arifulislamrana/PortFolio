<?php
namespace App\Repository\ContactRepository;

use App\Repository\BaseRepository\IBaseRepository;

interface IContactRepository extends IBaseRepository
{
    public function getAllPaginated($search);
}
