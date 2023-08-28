<?php
namespace App\Repository\ContactRepository;

use App\Models\Contact;
use App\Repository\BaseRepository\BaseRepository;

class ContactRepository extends BaseRepository implements IContactRepository
{
    public function __construct(Contact $model)
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
