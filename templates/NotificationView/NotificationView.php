<?php

class NotificationView
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <div class="col-2 alert alert-<?php echo $params["type"]?> d-flex flex-column align-items-center" role="alert">
            <a href="#" class="btn btn-<?php echo $params["type"]?> btn-circle">
                <i class="fas fa-info-circle"></i>
            </a><br>
            <?php echo $params["msg"]?>
        </div>
    <?php
        $html = ob_get_clean();
        return $html;
    }
}
    ?>
    
