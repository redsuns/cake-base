<?php
App::uses('ModelBehavior', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Upload Behavior
 * 
 * This Behavior requires GD to generate thumbnails and ALWAYS will preserve 
 * the aspect ratio.
 * 
 */
class UploadBehavior extends ModelBehavior
{

    protected $path;
    protected $allowedTypes = array(
        'image/jpeg',
        'image/png'
    );
    protected $width;
    public $settings = array();
    
    public $defaults = array(
        'path' => ''
    );

    function setup(Model $model, $config = array())
    {
        $this->settings[$model->alias] = $config;
        $this->path = isset($config['path']) ? $config['path'] : ROOT . '/app/webroot/img/photos/';
        $this->defaults['path'] = $this->path;
        $this->width = isset($config['width']) ? $config['width'] : 256;

        $this->__createDirectoryIfNotExists();
    }
    
    /**
     * 
     * @param Model $model
     * @param type $type
     * @return \UploadBehavior
     */
    public function allowType( Model $model, $type )
    {
        array_push($this->allowedTypes, $type);
        return $this;
    }
    
    /**
     * 
     * @param Model $model
     * @param int $width
     * @return \UploadBehavior
     */
    public function setWidth(Model $model, $width )
    {
        $this->width = $width;
        return $this;
    }
    
    
    /**
     * @param Model $model
     * @param array $data
     * @return string
     */
    public function doTheUpload(Model $model, $data)
    {
        $newName = $this->path . $data['name'];
            
        $image = 'error';
        if ( in_array($data['type'], $this->allowedTypes) ) {
            $oldName = $data['tmp_name'];
            $newName = $this->path . $data['name'];

            if ( !is_uploaded_file($data['tmp_name']) ) {
                rename($oldName, $newName);
            } else {
                move_uploaded_file($oldName, $newName);
            }
            
            $this->_makeThumbnail($data['name']);
            $image = $data['name'];
        }

        return $image;
    }
    
    /**
     * 
     * @param Model $model
     * @param string $fileName
     */
    public function removeFile(Model $model, $fileName)
    {   
        $file = new File($this->path . $fileName);
        $file->delete();
        
        $thumb = new File($this->path . 'thumb_' . $fileName);
        $thumb->delete();
        
        return true;
    }
    
    
    /**
     * 
     * @param string $image
     * @return boolean
     */
    protected function _makeThumbnail( $image )
    {
        $imageInfo = explode('.', $image);
        $extension = strtolower(end($imageInfo));
        
        switch($extension) {
            case 'jpg':
            case 'jpeg':
                $sourceImage = imagecreatefromjpeg($this->path . $image);
                break;
            case 'png':
                $sourceImage = imagecreatefrompng($this->path . $image);
                break;
            default:
                return false;
        }
        
        //Reading actual file width and height
        $originalWidth = imagesx($sourceImage);
        $originalHeight = imagesy($sourceImage);
        
        //calculating new Height based on width preserving aspect ratio
        $newHeight = floor($originalHeight * ($this->width / $originalWidth));
        
        // base to new image following new width and height
        $temporaryImage = imagecreatetruecolor($this->width, $newHeight);
        
        imagecopyresampled($temporaryImage, $sourceImage, 0, 0, 0, 0, $this->width, $newHeight, $originalWidth, $originalHeight);
        
        // Saving thumbnail
        $newImage = $this->path . 'thumb_' . $image;
        
        switch($extension) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($temporaryImage, $newImage);
                break;
            case 'png':
                imagepng($temporaryImage, $newImage);
                break;
        }
        
        return true;
    }
    
    /**
     *
     */
    private function __createDirectoryIfNotExists()
    {
        if ( !is_dir($this->path) ) {
            $folder = new Folder();
            $folder->create($this->path, 0755);
        }
        return true;
    }
    
}
