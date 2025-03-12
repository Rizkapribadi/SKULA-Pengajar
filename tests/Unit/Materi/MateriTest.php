<?php

namespace Tests\Unit\Materi;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Materi;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class MateriTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    //test dilakukan permethod
     public function testMateriCreate()
     {
        $materi = Materi::create(
            ["title" => "Introduction",
            "content" => "write a new article here this is just an example",
            "pelajaran_id" => "5c218c2c25149718ac007f82",
            "published" => false ,"order" => 1]
        );
        $this->assertDatabaseHas('materis', 
            ['title' => 'Introduction',
            'content' => 'write a new article here this is just an example',
            'pelajaran_id' => '5c218c2c25149718ac007f82',
            'published' => false ,'order' => 1]
        );
    }




 public function testMateriUpdate()
    {
        $materi = Materi::find("5c218ed72514971ad8006d92")->update(
            ["title" => "Update Introduction",
            "content" => "Update article here this is just an example",
            "pelajaran_id" => "5c218c2c25149718ac007f82",
            "published" => true ,"order" => 2]
        );

        $this->assertDatabaseHas('materis', 
            ['title' => 'Update Introduction',
            'content' => 'Update article here this is just an example',
            'pelajaran_id' => '5c218c2c25149718ac007f82',
            'published' => true ,'order' => 2]
        );
    }

     public function testMateriArchive()
    {

        $this->assertSoftDeleted('materis', 
            ['title' => 'Update Introduction',
            'content' => 'Update article here this is just an example',
            'pelajaran_id' => '5c218c2c25149718ac007f82',
            'published' => true ,'order' => 2]
        );
    }


     public function testMateriDelete()
    {
        $materi = Materi::create(
            ["title" => "Introduction",
            "content" => "write a new article here this is just an example",
            "pelajaran_id" => "5c218c2c25149718ac007f82",
            "published" => false ,"order" => 1]
        );

        $materi->forcedelete();

         $this->assertDatabaseMissing('materis', 
            ['title' => 'Introduction',
            'content' => 'write a new article here this is just an example',
            'pelajaran_id' => '5c218c2c25149718ac007f82',
            'published' => false ,'order' => 1]
        );
        
    }

     public function testMateriExport()
    {
            $materi = collect([
            ['title' => 'Update Introduction',
            'content' => 'Update article here this is just an example',
            'pelajaran_id' => '7a1727d625149719f4004880',
            'published' => true ,'order' => 2 ],
        ]);
  
    (new FastExcel($materi))->download('skula_'.'.ods');
    
        $this->call('GET', '/export', [
            'param' => 'value',
        ]);
        
         $this->assertTrue(true);

    }


     public function testMateriImport()
    {
        $collection= collect([
            ['title' => 'Update Introduction',
            'content' => 'Update article here this is just an example',
            'pelajaran_id' => '7a1727d625149719f4004880',
            'published' => true ,'order' => 2 ],
        ]);

        $collection = (new FastExcel)->import('skula.ods');

        $this->call('POST', '/import', [
            'param' => 'value',
        ]);
        
        $this->assertTrue(true);
    }

}
