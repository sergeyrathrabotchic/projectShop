<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_news_create_form()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    /*public function test_show_news()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(1,7), 'categoryId' =>1]));

        $response->assertStatus(200);
    }*/

    public function test_show_news_as_not_found_status()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(1000,199999)]));

        $response->assertStatus(404);
    }

    public function test_show_category_index()
    {
        $response = $this->get(route('category.index'));

        $response->assertOk();
    }

    public function test_show_main()
    {
        $response = $this->get(route('main'));

        $response->assertSuccessful();
    }

    public function test_show_admin_news_stor()
    {
    $response = $this->get(route('admin.news.store'));

    $response->assertSuccessful();
    }

    public function test_show_main_url()
    {
    $response = $this->get(route('main'));

    $response->assertLocation('/');
    }

    
    public function test_show_404()
    {
        $response = $this->get('/fkfkflfl');

        $response->assertNotFound();
    }

    public function test_show_eddNews_ok()
    {
        $response = $this->get('/eddNews');

        $response->assertOK();
    }

    public function test_show_admin()
    {
        $response = $this->get('/admin');

        $response->assertOK();
    }

    public function test_show_category()
    {
        $response = $this->get('/category');

        $response->assertOK();
    }

    public function test_show_admin_news()
    {
        $response = $this->get('admin/news');

        $response->assertOK();
    }

}
