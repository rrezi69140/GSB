<?php



use Tests\TestCase;

class AccesTest extends TestCase
{
    public function test_that_page_return_positive_responsse():void{
        $responsse = $this->get('/');
        $responsse->assertStatus(200);

    }

    public function test_accec_denied_user_disconnecte():void{
        $responsse = $this->get('/login');
        $responsse->assertStatus(401);
    }
}

