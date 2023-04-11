<?php

include_once ROOT.'/src/models/Admin.php';

class DeconnexionController extends Controller {

    public function index()
    {
        // render la page 
        $message = null;
        $user_is_connected = true;
        $this->redirectToRoute('', ['message' => $message, 'user_is_connected' => $user_is_connected]);
    }
}

?>