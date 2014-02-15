<?php

/**
 * Class GoogleMapsHelper
 */
class GoogleMapsHelper extends AppHelper
{
    protected $address;
    protected $idCanvas;
    protected $width = '400';
    protected $height = '500';

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
     * @param string $idCanvas
     * @return $this
     */
    public function setIdCanvas( $idCanvas )
    {
        $this->idCanvas = $idCanvas;
        return $this;
    }

    /**
     * @param string $width
     * @return $this
     */
    public function setWidth( $width )
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param string $height
     * @return $this
     */
    public function setHeight( $height )
    {
        $this->height = $height;
        return $this;
    }

    public function frameMap()
    {
        $address = urlencode($this->address);

        $mapElement = '<iframe width="' . $this->width . '" height="' . $this->height . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/?ie=UTF8&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=' . $address . ' &amp;aq=&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=' . $address . ' &amp;z=14&amp;output=embed&amp;t=m"></iframe><br />';
        $mapElement .= '<small><a href="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=' . $address . '&amp;aq=&amp;ie=UTF8&amp;hq=&amp;hnear=' . $address . '&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>';

        return $mapElement;
    }
} 