<?php

class DocController
{
    public static function renderViewAdd()
    {
        echo DocViewAdd::render(array(
            'title' => 'Upload Documents',
            'subtitle' => 'Upload Documents'
        ));
    }

    public static function renderViewShow()
    {
        echo DocViewShow::render(array(
            'title' => 'Show Documents',
            'subtitle' => 'Your Documents'
        ));
    }
}
