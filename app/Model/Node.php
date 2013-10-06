<?php

App::uses('AppModel', 'Model');

/**
 * Page Model
 *
 */
class Node extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Qual é o tipo desta página???',
            ),
        ),
        'location' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Qual é o local desta página???',
            ),
        ),
    );
}
