<?php

include_once ROOT.'/src/models/Contact.php';

class BackofficeContactsListController extends Controller {

    public function index($token) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $_SESSION["user_admin"] = false;
            $_SESSION["user_token"] = null;
            $this->redirectToRoute('/connexion');
        }


        $contacts = $this->getList('contact');
        $message = null;
        // render la page 
        $this->render('backofficeContactsList.php', ['contacts' => $contacts, 'token' => $token, 'message' => $message]);
    }

    public function formhandler($token,$entity,$form_action,$payload) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $_SESSION["user_admin"] = false;
            $_SESSION["user_token"] = null;
            $this->redirectToRoute('/connexion');
        }

        $message = null;

        if ($entity === 'contacts' && $form_action === "update") {
            $contact = Contact::getContactById($_POST["id"]);
            $contact->updateChamp('code_identification', $_POST["code"]);
            $contact->updateChamp('nom', $_POST["nom"]);
            $contact->updateChamp('prénom', $_POST["prénom"]);
            $contact->updateChamp('date_de_naissance', $_POST["date"]);
            $contact->updateChamp('nationalité', $_POST["nat"]);

            $message = 'Modification réussie : CONTACT '.$contact->getCodeIdentification().' => '.$_POST["code"];

        } else if ($entity === 'contacts' && $form_action === "delete") {
            $contact = Contact::getContactById($_POST["id"]);
            $contact->delete();

            $message = 'Eradication réussie : CONTACT '.$contact->getCodeIdentification(). ' => supprimé';

        } else if ($entity === 'contacts' && $form_action === "create") {
            $contact = new Contact($_POST["code"], $_POST["nom"], $_POST["prénom"], $_POST["date"], $_POST["nat"]);
            $contact->addContactToDatabase();

            $message = 'Création réussie : CONTACT '.$_POST["code"].' => ajouté à la base de données';
        }

         // re render la liste mise à jour
         $contacts = $this->getList('contact');
         $this->render('backofficeContactsList.php', ['contacts' => $contacts, 'token' => $token, 'message' => $message]);
    }
}

?>