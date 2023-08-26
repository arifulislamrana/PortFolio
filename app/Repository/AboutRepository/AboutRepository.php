<?php
namespace App\Repository\AboutRepository;

use App\Models\About;
use App\Repository\BaseRepository\BaseRepository;

class AboutRepository extends BaseRepository implements IAboutRepository
{
    public function __construct(About $model)
    {
        parent::__construct($model);
    }
}
