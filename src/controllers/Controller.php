<?php

class Controller {

    public function render(string $fichier, array $data = []){
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'/src/views/pages/'.$fichier);
    }

    public function redirectToRoute(string $route, array $datas = []){
        // Récupère les données et les extrait sous forme de variables
        extract($datas);

        $path = URLDUSITE.'public'.$route;

        //if ($datas) {
            foreach ($datas as $data) {
                $path = $path.'/'.$data;
            }
        //}


        // Crée le chemin et inclut le fichier de vue
        header('Location: '.$path);
    }
}

?>