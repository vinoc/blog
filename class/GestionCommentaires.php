<?php

class GestionCommentaires
{
    protected $bdd;


    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function listerCommentairesParArticle(int $idArticle)
    {
        $q = $this->bdd->prepare('SELECT * FROM commentaires WHERE idArticle = ?');
        $q-> execute([$idArticle]);


        //Placer les articles dans un tableau, puis les trier par date et idParent
        $commentaires = [];
        while ($commentaire = $q->fetch(PDO::FETCH_ASSOC))
        {
            $commentaires[]= $commentaire;
        }


        $id = [];
        $idParent=[];
        // Obtient une liste de colonnes
        foreach ($commentaires as $key => $row) {
            $id[$key]  = $row['id'];
            $idParent[$key] = $row['idParent'];
        }

        // Trie les données par volume décroissant, edition croissant
        // Ajoute $data en tant que dernier paramètre, pour trier par la clé commune
        array_multisort($id, SORT_DESC, $idParent, SORT_ASC, $commentaires);





        $tousLesCommentaires = [];
        foreach($commentaires as $value)
        {
            $tousLesCommentaires[] = new Commentaire($value);
            //$tousLesCommentaires[]=$commentaire;
        }
        return $tousLesCommentaires;
    }

    public function EnregistrerNouveauCommentaire($donnees): bool
    {
        $idArticle = (int) $donnees->idArticle();
        $idParent = $donnees->idParent();
        $commentaire = $donnees->commentaire();
        $idAuteur = $donnees->idAuteur();
        $date = date("d-m-y H:i:s");

        $q = $this->bdd->prepare('INSERT INTO commentaires (idArticle, commentaire, idAuteur, idParent, date) VALUE (?, ?, ?, ?, ?)');
        return $q->execute([$idArticle, $commentaire, $idAuteur, $idParent, $date]);

    }

    public function enfants()
    {
        $q = $this->bdd->query('SELECT * FROM commentaires WHERE idArticle = ?');
        $data = [];
        while ($commentaire = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $commentaire;
        }

//Pour trier le tableau, essayer cette fonction:


// Obtient une liste de colonnes
        foreach ($data as $key => $row) {
            $volume[$key] = $row['volume'];
            $edition[$key] = $row['edition'];
        }

// Trie les données par volume décroissant, edition croissant
// Ajoute $data en tant que dernier paramètre, pour trier par la clé commune
        array_multisort($volume, SORT_DESC, $edition, SORT_ASC, $data);

    }
}
