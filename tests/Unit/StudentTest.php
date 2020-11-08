<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Entities\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
  use RefreshDatabase;

  /**
   * @test
   */
  public function can_create_student()
  {
    $student = new Student([
      'name' => 'Eleazar Gan',
      'email' => 'eleazar11egkh@gmail.com',
      'password' => 'abcde12345'
    ]);

    $data = $student->create();

    $this->assertEquals($data->name, 'Eleazar Gan');
    $this->assertEquals($data->email, 'eleazar11egkh@gmail.com');
    $this->assertEquals($data->role, 'student');
  }

  /**
   * @test
   */
  public function can_get_student_by_id()
  {
    $student = new Student([
      'name' => 'Eleazar Gan',
      'email' => 'eleazar11egkh@gmail.com',
      'password' => 'abcde12345'
    ]);

    $data = $student->create();

    $getStudent = new Student($data->id);
    $studentObject = $getStudent->get();

    $this->assertEquals($studentObject->name, 'Eleazar Gan');
    $this->assertEquals($studentObject->email, 'eleazar11egkh@gmail.com');
    $this->assertEquals($studentObject->role, 'student');
  }

  /**
   * @test
   */
  public function can_throw_error_when_get_non_student()
  {
    $user = new Student([
      'name' => 'Eleazar Gan',
      'email' => 'eleazar11egkh@gmail.com',
      'password' => 'abcde12345'
    ]);

    $data = $user->create();
    $data->role = 'test';
    $data->save();

    try {
      $getStudent = new Student($data->id);
      $studentObject = $getStudent->get();
    } catch (\Exception $e) {
      $this->assertEquals($e->getMessage(), 'User invalid');
    }
  }
}
