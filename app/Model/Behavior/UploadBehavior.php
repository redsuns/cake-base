<?php

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

    function setup(Model $model, $config = array())
    {
        $this->settings[$model->alias] = $config;
        $this->path = 'img/photos/';
        $this->width = 256;

        $this->_createDirectoryIfDoesntExist();
    }
    
    /**
     * 
     * @param Model $model
     * @param int $width
     */
    public function setWidth(Model $model, $width )
    {
        $this->width = $width;
    }
    
    
    /**
     * @param Model $model
     * @param array $data
     * @return string
     */
    public function doTheUpload(Model $model, $data)
    {
        $image = '';
        if ( in_array($data['type'], $this->allowedTypes) ) {
            if(move_uploaded_file($data['tmp_name'], $this->path . $data['name'])) {
                $this->_makeThumbnail($data['name']);
                $image = $data['name'];
            }
        }

        return $image;
    }
    
    /**
     * 
     * @param Model $model
     * @param string $file
     */
    public function detachFile(Model $model, $file)
    {
        $file = explode('/', $file);
        $fileName = end($file);
        
        unlink($this->path . $fileName);
        unlink($this->path . 'thumb_' . $fileName);
    }
    
    
    /**
     *
     */
    protected function _createDirectoryIfDoesntExist()
    {
        if ( !is_dir($this->path) ) {
            mkdir($this->path, 0777, true);
        }
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
                break;
        }
        
        //Reading actual file width and height
        $originalWidth = imagesx($sourceImage);
        $originalHeight = imagesy($sourceImage);
        
        //calculating new Height based on width preserving aspect ratio
        $newHeight = floor($height * ($this->width / $width));
        
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
            default:
                break;
        }
        
        return true;
    }
    
}
