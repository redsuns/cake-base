<?php
App::uses('Photo', 'Model');
App::uses('UploadBehavior', 'Model/Behavior');
App::uses('Folder', 'Utility');

/**
 * @group App
 */
class UploadBehaviorTest extends CakeTestCase
{
    protected $class;
    protected $behavior;
    protected $model;
    protected $originPath;
    protected $destinationPath;
    
    
    public function setUp()
    {
        parent::setUp();
        
        $this->class = 'UploadBehavior';
        $this->model = new Model();
        $this->originPath = ROOT . '/app/webroot/img/';
        $this->destinationPath = ROOT . '/app/webroot/img/teste/';
        
        $this->behavior = new UploadBehavior();
        $this->behavior->setup($this->model, array('path' => $this->destinationPath));
    }
    
    public function tearDown() 
    {
        @unlink($this->originPath . 'avatar_tmp.png');
        @unlink($this->originPath . 'logo-face_tmp.jpg');
        @unlink($this->originPath . 'jquery.wysiwyg_tmp.gif');
        
        $folder = new Folder();
        $folder->delete($this->destinationPath);
        

        unset($this->class, $this->behavior, $this->model, $this->originPath, $this->destinationPath);
        parent::tearDown();
    }
    
    public function testSetUp()
    {
        $folder = new Folder();
        $folder->delete($this->destinationPath);
        $this->behavior->setWidth($this->model, array('path' => $this->destinationPath));
    }
    
    public function testAllowType()
    {
        $result = $this->behavior->allowType($this->model, 'image/gif');
        $this->assertinstanceOf($this->class, $result);
    }
    
    public function testIfIsSettingWidth()
    {
        $result = $this->behavior->setWidth($this->model, 150);
        $this->assertInstanceOf($this->class, $result);
    }
    
    
    public function testRemoveFile()
    {
        $fileName = $this->destinationPath . 'avatar.png';
        $thumbName = $this->destinationPath . 'thumb_avatar.png';
        
        $file = new File($this->originPath . 'avatar.png');
        $file->copy($fileName);
        
        $this->assertTrue($this->behavior->removeFile($this->model, $fileName));
    }
    
    
    public function testTheUploadPng()
    {
        $imageSize = filesize($this->originPath . 'avatar.png');
        
        $imagePng = array(
            'name' => 'avatar.png',
            'tmp_name' => $this->originPath . 'avatar_tmp.png',
            'size' => $imageSize,
            'type' => 'image/png',
            'error' => 0
        );
        
        copy($this->originPath . 'avatar.png', $this->originPath . 'avatar_tmp.png');
        
        $imagePngUploaded = $this->behavior->setWidth($this->model, 10)
                                            ->doTheUpload($this->model, $imagePng);
        
        $this->assertEquals('avatar.png', $imagePngUploaded);
    }
    
    
    public function testTheUploadJpg()
    {
        $imageSize = filesize($this->originPath . 'logo-face.jpg');
        
        $imageJpg = array(
            'name' => 'logo-face.jpg',
            'tmp_name' => $this->originPath . 'logo-face_tmp.jpg',
            'size' => $imageSize,
            'type' => 'image/jpeg',
            'error' => 0
        );
        
        copy($this->originPath . 'logo-face.jpg', $this->originPath . 'logo-face_tmp.jpg');
        
        $imageJpgUploaded = $this->behavior->setWidth($this->model, 10)
                                            ->doTheUpload($this->model, $imageJpg);
        
        $this->assertEquals('logo-face.jpg', $imageJpgUploaded);
    }
    
    public function testTheUploadGifNotAllowed()
    {
        $imageSize = filesize($this->originPath . 'jquery.wysiwyg.gif');
        
        $imageGif = array(
            'name' => 'jquery.wysiwyg.gif',
            'tmp_name' => $this->originPath . 'jquery.wysiwyg_tmp.gif',
            'size' => $imageSize,
            'type' => 'image/gif',
            'error' => 0
        );
        
        copy($this->originPath . 'jquery.wysiwyg.gif', $this->originPath . 'jquery.wysiwyg_tmp.gif');
        
        $imageGifUploaded = $this->behavior->setWidth($this->model, 10)
                                            ->doTheUpload($this->model, $imageGif);
     
        $this->assertEquals('error', $imageGifUploaded);
    }
    
    
    public function testTheUploadGifAllowedButNotSaved()
    {
        $imageSize = filesize($this->originPath . 'jquery.wysiwyg.gif');
        
        $imageGif = array(
            'name' => 'jquery.wysiwyg.gif',
            'tmp_name' => $this->originPath . 'jquery.wysiwyg_tmp.gif',
            'size' => $imageSize,
            'type' => 'image/gif',
            'error' => 0
        );
        
        copy($this->originPath . 'jquery.wysiwyg.gif', $this->originPath . 'jquery.wysiwyg_tmp.gif');
        
        $this->behavior->setWidth($this->model, 10)
                        ->allowType($this->model, 'image/gif')
                        ->doTheUpload($this->model, $imageGif);
    }
    
}
