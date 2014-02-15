<?php

/**
 * Class GoogleMapsHelper
 */
class GoogleMapsIframeHelper extends AppHelper
{
    protected $address;
    protected $idCanvas;
    protected $width = '400';
    protected $height = '500';
    protected $frameContent = '';

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress( $address )
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Set the map width in pixels eg. 470.
     * Isn´t need to add "px" suffix
     * 
     * @param string $width
     * @return $this
     */
    public function setWidth( $width )
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Set the map height in pixels eg. 470.
     * Isn´t need to add "px" suffix
     * 
     * @param string $height
     * @return $this
     */
    public function setHeight( $height )
    {
        $this->height = $height;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function show()
    {
        return $this->_setFrameContent()->frameContent;
    }

    /**
     * 
     * @return \GoogleMapsIframeHelper
     */
    protected function _setFrameContent()
    {
        $address = urlencode($this->address);

        $mapElement = '<iframe width="' . $this->width . '" height="' . $this->height . '" ';
        $mapElement .= 'frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ';
        $mapElement .= 'src="https://maps.google.com.br/?ie=UTF8&amp;source=s_q&amp;hl=pt-BR&amp;';
        $mapElement .= 'geocode=&amp;q=' . $address . ' &amp;aq=&amp;t=h&amp;ie=UTF8&amp;hq=&amp;';
        $mapElement .= 'hnear=' . $address . ' &amp;z=14&amp;output=embed&amp;t=m"></iframe><br />';
        $mapElement .= '<small><a target="_blank" href="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;';
        $mapElement .= 'hl=pt-BR&amp;geocode=&amp;q=' . $address . '&amp;aq=&amp;ie=UTF8&amp;';
        $mapElement .= 'hq=&amp;hnear=' . $address . '&amp;t=m&amp;z=14" style="color:#0000FF;';
        $mapElement .= 'text-align:left">' . __('Show amplied map') . '</a></small>';

        $this->frameContent = $mapElement;
        
        return $this;
    }
} 