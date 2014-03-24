<?php

/**
 * Slug Behavior
 * 
 * 
 */
class SlugBehavior extends ModelBehavior
{

    public $settings = array();

    /**
     * 
     * @param Model $model
     * @param array $config
     */
    function setup(Model $model, $config = array())
    {
        $this->settings[$model->alias] = $config;
    }

    
    /**
     * 
     * @param Model $model
     * @param array $options
     * @return boolean
     */
    public function beforeSave(Model $model, $options = array()) 
    {
        if ( !isset($model->data[$model->alias]['id']) && !empty($this->settings[$model->alias]['field'])) {
            $model->data[$model->alias]['slug'] = $this->_generateSlug($model, $this->settings[$model->alias]['field']);
        }
        return true;
    }
    
    /**
     * At the moment just on Create is able to parse currectly
     * the slug
     * 
     * @param Model $model
     * @param string $field
     * @return string
     */
    protected function _generateSlug(Model $model, $field )
    {
        $slug = strtolower(Inflector::slug($model->data[$model->alias][$field], '-'));
            
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
