<?php

class NotificationController
{
    public static function renderViewInfo(String $msg)
    {
        echo NotificationView::render(array(
            'type' => "info",
            'msg' => $msg
        ));
    }
    public static function renderViewSuccess(String $msg)
    {
        echo NotificationView::render(array(
            'type' => "success",
            'msg' => $msg
        ));
    }
    public static function renderViewWarning(String $msg)
    {
        echo NotificationView::render(array(
            'type' => "warning",
            'msg' => $msg
        ));
    }
    public static function renderViewDanger(String $msg)
    {
        echo NotificationView::render(array(
            'type' => "danger",
            'msg' => $msg
        ));
    }

}
