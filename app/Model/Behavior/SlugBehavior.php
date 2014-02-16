<?php

/**
 * Slug Behavior
 * 
 * 
 */
class SlugBehavior extends ModelBehavior
{

    public $settings = array();

    function setup(Model $model, $config = array())
    {
        $this->settings[$model->alias] = $config;
    }

    /**
     * At the moment just on Create is able to parse currectly
     * the slug
     * 
     * @param Model $model
     * @param string $string
     * @return string
     */
    public function generateSlug(Model $model, $string )
    {
        $slug = strtolower(Inflector::slug($string, '-'));
            
        $lastSlug = $model->find('first', array(
            'conditions' => array($model->alias . '.slug LIKE' => $slug . '%'),
            'order' => array($model->alias . '.slug' => 'DESC'),
            'limit' => 1));

        if ( $lastSlug ) {

            $explodedSlug = explode('-', $lastSlug[$model->alias]['slug']);
            $currentSlugCount = end($explodedSlug);

            $nextSlugCount = $currentSlugCount + 2;
            if ( is_numeric($currentSlugCount) ) {
                $nextSlugCount = $currentSlugCount + 1;
            }

            $slug .= '-' . $nextSlugCount;
        }


        return $slug;
    }

}
