<?php

namespace App\Entities;

interface IUser {
  public function __construct($data);
  public function create();
  public function get();
}