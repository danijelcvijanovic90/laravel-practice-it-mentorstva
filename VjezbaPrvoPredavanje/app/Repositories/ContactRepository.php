<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function sendContact($data)
    {
        return $this->contactModel->create($data->validated());
    }

    public function getContactById($id)
    {
        return $this->contactModel->where('id', $id)->first();
    }
}
