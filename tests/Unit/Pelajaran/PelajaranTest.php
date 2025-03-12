<?php

namespace Tests\Unit\Pelajaran;
use App\Pelajaran;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelajaranTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    //test dilakukan permethod

    public function testPelajaranCreate()
    {
        $pelajaran = Pelajaran::create(["name" => "Bahasa Inggris","gambar" => "gambar/image.png"]);
        $this->assertDatabaseHas('pelajarans', [
         'name' => 'Bahasa Inggris','gambar' => 'gambar/image.png'
      ]);
    }
     public function testPelajaranUpdate()
    {
        $pelajaran = Pelajaran::find("5c218c2c25149718ac007f82")->update(["name" => "Matematika","gambar" => "gambar/math.png"]);

        $this->assertDatabaseHas('pelajarans', [
         'name' => 'Matematika','gambar' => 'gambar/math.png']);
    }


}
