<?php

class Articles extends Controller
{
    protected Article $Article;
    protected Marque $Marque;
    protected Couleur $Couleur;
    protected Type $Type;


    public function index(): void
    {
        $this->loadModel("Article");
        $allArticles= $this->Article->allArticles();
        $allMarques = $this->Article->allMarques();
        $allCouleurs = $this->Article->allCouleurs();
        $allTypes = $this->Article->allTypes();
        $btnId = "btnArticle";
        $this->render('index', compact('allArticles','btnId','allMarques', 'allCouleurs','allTypes'));
    }

    public function edit(int $currentArticleId)
    {
        $btnId = "btnArticle";
        $this->loadModel("Article");
        $allMarques = $this->Article->allMarques();
        $allCouleurs= $this->Article->allCouleurs();
        $allTypes= $this->Article->allTypes();
        $this->render('edit', compact('currentArticleId','allMarques','btnId','allCouleurs','allTypes'));
    }

    public function newArticle(): void
    {
  
        if (!empty($_POST['article'])) {
            $this->loadModel("Article");
            $this->Article->insertArticle(
                htmlentities($_POST['article']),//htmlentities securise la donnée utilisateur ($_POST) afin que la donnée ne soit pas interprétée comme du code et empeche donc toute injection      
                htmlentities($_POST['prix']),
                htmlentities($_POST['volume']),
                htmlentities($_POST['titrage']),
                htmlentities($_POST['marque']),
                htmlentities($_POST['couleur']),
                htmlentities($_POST['type']));

            $this->redirectWithMessage("Article <b>".$_POST['article']."</b> bien ajouté", "success");
        } else {
            header("Location: " . PATH . "/articles");
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////
    public function updateArticle(): void
    {
           $updatedArticle = array();
        if (!empty($_POST['updatedArticle'])) {

            $updatedArticle['idMarque'] = htmlentities($_POST['updatedMarque'], ENT_QUOTES);
            $updatedArticle['updatedArticle'] = htmlentities($_POST['updatedArticle']);
            $updatedArticle['idArticle'] = htmlentities($_POST['id']);
            $updatedArticle['prix'] = htmlentities($_POST['prix']);
            $updatedArticle['volume'] = htmlentities($_POST['volume']);
            $updatedArticle['titrage'] = htmlentities($_POST['titrage']);
            $updatedArticle['idCouleur'] = htmlentities($_POST['updatedCouleur']);
            $updatedArticle['idType'] = htmlentities($_POST['updatedType']);
            
            $this->loadModel("Article");
            $this->Article->updateArticle($updatedArticle);
            $this->redirectWithMessage('Article bien modifié', 'info');
        }
    }

    public function deleteArticle(int $id): void
    {
        $this->loadModel("Article");
        $this->Article->delete(htmlentities($id));
        $this->redirectWithMessage('Article numéro <b>'.$id.'</b> bien supprimé', 'danger');
    }


    private function redirectWithMessage($message, $type_message = null): void
    {
        $this->loadModel("Article");
        $allArticles = $this->Article->allArticles();
        $allMarques = $this->Article->allMarques();
        $allCouleurs = $this->Article->allCouleurs();
        $allTypes = $this->Article->allTypes();
        $btnId = "btnArticle";
        $this->render('index', compact('allArticles','allMarques','allCouleurs','allTypes', 'message', 'type_message','btnId'));
    }
}
