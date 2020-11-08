<?php

namespace App\Entities;

use App\Repositories\UserRepository;
use App\Entities\IUser;

class Student implements IUser
{
  private $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function create()
  {
    $uRepo = new UserRepository();

    return $uRepo->store(array_merge($this->data, [
      'role' => 'student'
    ]));
  }

  public function get()
  {
    $uRepo = new UserRepository();
    $user = $uRepo->getById($this->data);

    if ($user->role === 'student') {
      return $user;
    } else {
      throw new \Exception('User invalid');
    }
  }
}
