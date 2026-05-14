
<?php

class Continents extends Controller
{
    protected Model $Continent;

    public function index(): void
    {
        $this->loadModel("Continent");
        $allContinents = $this->Continent->getAll();
        $btnId = "btnContinent";
        $this->render('index', compact('allContinents','btnId'));
    }

    public function edit(int $currentContinentId)
    {
        $btnId = "btnContinent";
        $this->render('edit', compact('currentContinentId','btnId'));
    }

    public function newContinent(): void
    {
        $continent = $_POST['continent'];
        if (!empty($_POST['continent'])) {
            $this->loadModel("Continent");
            $this->Continent->insert($continent);
            $this->redirectWithMessage("Continent " .$continent. "  bien ajouté", "success");
        }else{
        header("Location: " . PATH . "/continents");        
        } 
    }

    public function updateContinent(): void
    {
        if (!empty($_POST['updatedContinent'])) {
            $currentContinentId = htmlentities($_POST['id']);
            $updatedContinent = htmlentities($_POST['updatedContinent']);
            $this->loadModel("Continent");
            $this->Continent->update($currentContinentId, $updatedContinent);
            $this->redirectWithMessage('Continent ' .$updatedContinent. ' bien modifié', 'info');
        }
    }

    public function deleteContinent(int $id): void
    {
        $this->loadModel("Continent");
        $this->Continent->delete(htmlentities($id));
        $this->redirectWithMessage('Continent ' .$id.  ' bien supprimée', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Continent");
        $allContinents = $this->Continent->getAll();
        $btnId = "btnContinent";
        $this->render('index', compact('allContinents', 'message', 'type_message','btnId'));
    }
}
