<?php
/**
 * @author: Damien Galicher (Inso-61)
 * Date: 23/04/16
 * Time: 21:13
 */

namespace Aonyx\Classes;


class Errors
{

    const HTTP_404 = "HTTP/1.0 404 Not Found";
    const HTTP_REDIRECT_TO_ROOT = "refresh:5;url=/";

    const ALERT_SUCCESS = "alert alert-success";
    const ALERT_INFO = "alert alert-info";
    const ALERT_DANGER = "alert alert-danger";
    const ALERT_WARNING = "alert alert-warning";

    static public function noRouteAction()
    {
        header(self::HTTP_404);
        header(self::HTTP_REDIRECT_TO_ROOT);
        echo '<div class="' . self::ALERT_DANGER . '" role="alert"><strong>404 Error :</strong> No route action.</div><br />You\'ll be redirected in about 5 secs. If not, click <a href="/">here</a>.';
    }

    static public function noRouteModule()
    {
        header(self::HTTP_404);
        header(self::HTTP_REDIRECT_TO_ROOT);
        echo '<div class="' . self::ALERT_DANGER . '" role="alert"><strong>404 Error :</strong> No route module match found.</div><br />You\'ll be redirected in about 5 secs. If not, click <a href="/">here</a>.';
    }
}