<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Category;
use App\Models\User;
use DB;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /* public function testDatabase()
     {
         // Make call to application...
      
         $this->assertTrue($this->assertDatabaseHas('users', [
            'email' => 'test@example.com'
        ]));
     }*/
    public function categoryTest()
    {
        $x = Category::all();
        $x = $x->title ;
        $this->assertCount(2, $x);
    }
  
    

     public function category_page_is_accessible()
    {
        $this->get('/category-tree-view')
            ->assertOk();
    }

    public function canCreateACategory()
    {
        $data = [
            'title' => $this->faker->sentence,
            //'description' => $this->faker->paragraph
        ];

        $response = $this->json('POST', '/category-tree-view', $data);

        $response->assertStatus(201)
             ->assertJson(compact('data'));
        
       /* $this->assertDatabaseHas('posts', [
          'title' => $data['title'],
          'description' => $data['description']
        ]);*/
    }

     public function a_user_can_read_all_the_tasks()
    {
        //Given we have task in the database
        $task = factory('App\Models\Category')->create();

        //When user visit the tasks page
        $response = $this->get('/category-tree-view');

        //He should be able to read the task
        $response->assertSee($task->title);
    }

     public function table_users_test()
     {
        $response = $this->assertDatabaseHas('users', [
            'email' => 'e@gmail.com',
        ]);
        $response->assertTrue(true);
     }
   
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
    
    public function test_that_1_is_1()
    {
       
        $this->assertTrue(1 == 1);
    }
    

    public function canCreateACategory2()
    {
        $data = [
            'title' => $this->faker->sentence,
            //'description' => $this->faker->paragraph
        ];

        $response = $this->json('POST', '/add-category', $data);

        $response->assertStatus(201)
             ->assertJson(compact('data'));
        
        $this->assertDatabaseHas('posts', [
          'title' => $data['title']
          //'description' => $data['description']
        ]);
    }

    
    
}
