<?php

class IntraWayTest extends TestCase
{
    public function testCorrect()
    {
        $this->json('GET',
                '/fizzbuzz/1/5');
        
        $this->assertEquals(200, $this->response->getStatusCode());
    }
    
    public function testEmptyParams()
    {
        $this->json('GET',
                '/fizzbuzz');
        $this->assertEquals(404, $this->response->getStatusCode());
    }
    
    
    public function testInvalidParams()
    {
        $this->json('GET',
                '/fizzbuzz/55/17');
        $this->assertEquals(403, $this->response->getStatusCode());
    }
    
}
