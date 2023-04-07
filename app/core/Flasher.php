<?php
class Flasher
{
    public static function setFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type,
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            $message = $_SESSION['flash']['message'];
            $type = $_SESSION['flash']['type'];

            echo '
                <div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">' . $message . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['flash']);
        }
    }
}
