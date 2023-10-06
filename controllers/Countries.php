<?php

class Countries extends Controller
{
    protected Country $Country;

    public function index(): void
    {
        $this->loadModel("Country");
        $allCountries = $this->Country->allCountries();
        $allContinents = $this->Country->allContinents();
        $btnId = "btnCountries";
        $this->render('index', compact('allCountries','btnId','allContinents'));
    }

    public function edit(int $currentCountryId)
    {
        $btnId = "btnCountry";
        $this->loadModel("Country");
        $allContinents = $this->Country->allContinents();
        $this->render('edit', compact('currentCountryId','allContinents','btnId'));
    }

    public function newCountry(): void
    {
  
        if (!empty($_POST['country'])) {
            $this->loadModel("Country");
            $this->Country->insertCountry($_POST['country'],$_POST['continent']);
            $this->redirectWithMessage("Pays <b>".$_POST['country']."</b> bien ajouté", "success");
        } else {
            header("Location: " . PATH . "/countries");
        }
    }

    public function updateCountry(): void
    {
           $updatedCountry = array();
        if (!empty($_POST['updatedCountry'])) {

            $updatedCountry['idContinent'] = $_POST['updatedContinent'];
            $updatedCountry['updatedCountry'] = $_POST['updatedCountry'];
            $updatedCountry['idCountry'] = $_POST['id'];
            
            $this->loadModel("Country");
            $this->Country->updateCountry($updatedCountry);
            $this->redirectWithMessage('Pays bien modifié', 'info');
        }
    }

    public function deleteCountry(int $id): void
    {
        $this->loadModel("Country");
        $this->Country->delete($id);
        $this->redirectWithMessage('Pays numéro <b>'.$id.'</b> bien supprimé', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Country");
        $allCountries = $this->Country->allCountries();
        $allContinents = $this->Country->allContinents();
        $btnId = "btnCountry";
        $this->render('index', compact('allCountries','allContinents', 'message', 'type_message','btnId'));
    }
}
