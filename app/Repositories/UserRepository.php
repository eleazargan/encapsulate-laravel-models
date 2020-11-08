<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
  public function store($data)
  {
    $user = User::create($data);

    return $user;
  }

  public function getById($id)
  {
    $user = User::find($id);

    return $user;
  }

  public function getAll()
  {
    $users = User::query()->paginate(15);

    return $user;
  }
}
