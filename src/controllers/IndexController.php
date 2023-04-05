<?php

if (DEBUG) { define('INDEXCONTROLLER', true); }

class IndexController extends Controller {

    public function index() {
        $this->render('index.php', []);
    }
}

?>