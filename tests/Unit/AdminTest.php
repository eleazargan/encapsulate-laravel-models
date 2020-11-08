<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Entities\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
  use RefreshDatabase;

  /**
   * @test
   */
  public function can_create_admin()
  {
    $admin = new Admin([
      'name' => 'Eleazar Gan',
      'email' => 'eleazar11egkh@gmail.com',
      'password' => 'abcde12345'
    ]);

    $data = $admin->create();

    $this->assertEquals($data->name, 'Eleazar Gan');
    $this->assertEquals($data->email, 'eleazar11egkh@gmail.com');
    $this->assertEquals($data->role, 'admin');
  }

  /**
   * @test
   */
  public function can_get_admin_by_id()
  {
    $admin = new Admin([
      'name' => 'Eleazar Gan',
      'email' => 'eleazar11egkh@gmail.com',
      'password' => 'abcde12345'
    ]);

    $data = $admin->create();

    $getAdmin = new Admin($data->id);
    $adminObject = $getAdmin->get();

    $this->assertEquals($adminObject->name, 'Eleazar Gan');
    $this->assertEquals($adminObject->email, 'eleazar11egkh@gmail.com');
    $this->assertEquals($adminObject->role, 'admin');
  }

  /**
   * @test
   */
  public function can_throw_error_when_get_non_admin()
  {
    $user = new Admin([
      'name' => 'Eleazar Gan',
      'email' => 'eleazar11egkh@gmail.com',
      'password' => 'abcde12345'
    ]);

    $data = $user->create();
    $data->role = 'test';
    $data->save();

    try {
      $getAdmin = new Admin($data->id);
      $adminObject = $getAdmin->get();
    } catch (\Exception $e) {
      $this->assertEquals($e->getMessage(), 'User invalid');
    }
  }
}
