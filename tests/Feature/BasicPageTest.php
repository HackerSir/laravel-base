<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;

class BasicPageTest extends BrowserKitTestCase
{
    public function testHomePage()
    {
        $this->visit(route('index'))
            ->assertResponseStatus(200);
    }
}
