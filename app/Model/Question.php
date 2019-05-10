<?php

class Question extends AppModel
{
    public $validate = array(
        'name' => array(
            'allowEmpty' => false
        )
    );
}
