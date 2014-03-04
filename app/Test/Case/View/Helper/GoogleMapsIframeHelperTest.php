<?php
App::uses('View', 'View');
App::uses('AppHelper', 'View/Helper');
App::uses('GoogleMapsIframeHelper', 'View/Helper');

/**
 * @group App
 */
class GoogleMapsIframeHelperTest extends CakeTestCase
{
    
    protected $GoogleMapsIframe;
    protected $class;
    
    public function setUp()
    {
        $view = new View();
        $this->GoogleMapsIframe = new GoogleMapsIframeHelper($view);
        $this->class = 'GoogleMapsIframeHelper';
        
        parent::setUp();
    }
    
    public function tearDown()
    {
        unset($this->GoogleMapsIframe, $this->class);
        parent::tearDown();
    }
    
    
    public function testifIsSettingAddress()
    {
        $result = $this->GoogleMapsIframe->setAddress('Rua teste');
        
        $this->assertNotNull($result);
        $this->assertInstanceOf($this->class, $result);
        $this->assertEquals('Rua teste', $result->getAddress());
    }
    
    
    public function testIfIsSettingWidth()
    {
        $result = $this->GoogleMapsIframe->setWidth(400);
        
        $this->assertNotNull($result);
        $this->assertInstanceOf($this->class, $result);
        $this->assertEquals(400, $this->GoogleMapsIframe->getWidth());
    }
    
    public function testIfIsSettingHeight()
    {
        $result = $this->GoogleMapsIframe->setHeight(400);
        
        $this->assertNotNull($result);
        $this->assertInstanceOf($this->class, $result);
        $this->assertEquals(400, $this->GoogleMapsIframe->getHeight());
    }
    
    
    public function testIfIsShowingMapAsExpected()
    {
        $address = 'Av Marechal Floriano Peixoto, 2222, Curitiba - PR';
        
        $map = $this->GoogleMapsIframe->setWidth(200)
                                        ->setHeight(200)
                                        ->setAddress($address)
                                        ->show();
        
        $this->assertContains('iframe', $map);
        $this->assertContains(urlencode($address), $map);
    }
}
