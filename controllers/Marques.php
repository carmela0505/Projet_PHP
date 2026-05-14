<?php

class Marques extends Controller
{
    protected Marque $Marque;
    protected Country $Country;
    protected Fabricant $Fabricant;


    public function index(): void
    {
        $this->loadModel("Marque");
        $allMarques= $this->Marque->allMarques();
        $allCountries = $this->Marque->allCountries();
        $allFabricants = $this->Marque->allFabricants();
        $btnId = "btnMarque";
        $this->render('index', compact('allMarques','btnId','allCountries', 'allFabricants'));
    }

    public function edit(int $currentMarqueId)
    {
        $btnId = "btnMarque";
        $this->loadModel("Marque");
        $allCountries = $this->Marque->allCountries();
        $allFabricants= $this->Marque->allFabricants();
        $this->render('edit', compact('currentMarqueId','allCountries','btnId','allFabricants'));
    }

    public function newMarque(): void
    {
  
        if (!empty($_POST['marque'])) {
            $this->loadModel("Marque");
            $this->Marque->insertMarque(
                htmlentities($_POST['marque']),//htmlentities securise la donnée utilisateur ($_POST) afin que la donnée ne soit pas interprétée comme du code et empeche donc toute injection      
                htmlentities($_POST['country']),
                htmlentities($_POST['fabricant']));

            $this->redirectWithMessage("Marques <b>".$_POST['marque']."</b> bien ajouté", "success");
        } else {
            header("Location: " . PATH . "/marques");
        }
    }

    public function updateMarque(): void
    {
           $updatedMarque = array();
        if (!empty($_POST['updatedMarque'])) {

            $updatedMarque['idCountry'] = htmlentities($_POST['updatedCountry']);
            $updatedMarque['updatedMarque'] = htmlentities($_POST['updatedMarque']);
            $updatedMarque['idMarque'] = htmlentities($_POST['id']);
            $updatedMarque['idFabricant'] = htmlentities($_POST['updatedFabricant']);
            
            $this->loadModel("Marque");
            $this->Marque->updateMarque($updatedMarque);
            $this->redirectWithMessage('Marque bien modifié', 'info');
        }
    }

    public function deleteMarque(int $id): void
    {
        $this->loadModel("Marque");
        $this->Marque->delete(htmlentities($id));
        $this->redirectWithMessage('Marque numéro <b>'.$id.'</b> bien supprimé', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Marque");
        $allMarques = $this->Marque->allMarques();
        $allCountries = $this->Marque->allCountries();
        $allFabricants = $this->Marque->allFabricants();
        $btnId = "btnMarque";
        $this->render('index', compact('allMarques','allCountries','allFabricants', 'message', 'type_message','btnId'));
    }
}
