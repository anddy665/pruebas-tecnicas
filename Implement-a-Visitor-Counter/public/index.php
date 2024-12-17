<?php


class VisitCounter
{

    public $reset_time;

    public function __construct($reset_time)
    {
        $this->reset_time = $reset_time;
    }


    public function timerCounter($resetTime)
    {
        session_start();
        if (isset($_SESSION['visit_counter']) && isset($_SESSION['visit_time'])) {
            $time_since_first_visit = time() - $_SESSION['visit_time'];


            if ($time_since_first_visit > $resetTime) {
                $_SESSION['visit_counter'] = 1;
                $_SESSION['visit_time'] = time();
            } else {
                $_SESSION['visit_counter']++;
            }
        } else {

            $_SESSION['visit_counter'] = 1;
            $_SESSION['visit_time'] = time();
        }

        echo "<h1>Contador de visitas</h1>";
        echo "<p>Has visitado esta página " . $_SESSION['visit_counter'] . " veces en las últimas 24 horas.</p>";


        $time_remaining = $resetTime - (time() - $_SESSION['visit_time']);
        echo "<p>El contador se reiniciará en: " . gmdate("H:i:s", $time_remaining) . "</p>";
    }
}



$time = 24 * 60 * 60;


$timer = new VisitCounter($time);
var_dump($timer);
$timer->timerCounter($timer->reset_time);
