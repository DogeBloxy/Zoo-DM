<?php

namespace App\models;

require_once __DIR__ . '/Database.php';
/**
 * Classe Enclosure
 * Représente un enclos avec des informations telles que son identifiant, son nom, sa description, 
 * et sa date de création.
 */
class Enclosure extends Database
{
    /**
     * @var int $id Identifiant unique de l'enclos.
     */
    private int $id;

    /**
     * @var string $name Nom de l'enclos.
     */
    private string $name;

    /**
     * @var string $description Description de l'enclos.
     */
    private string $description;

    /**
     * @var mixed $created_at Date de création de l'enclos.
     */
    private $created_at;

    /**
     * Retourne l'identifiant unique de l'enclos.
     * @return int L'identifiant de l'enclos.
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Définit l'identifiant unique de l'enclos.
     * Valide que l'identifiant est un entier strictement positif.
     * @param mixed $id L'identifiant à définir.
     * @throws \Exception Si l'identifiant est invalide.
     */

    public function setId($id)
    {
        if (empty($id)) throw new \Exception('L\'id de la tâche est obligatoire');
        if (!is_numeric($id)) throw new \Exception('L\'id de la tâche doit être un entier');
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new \Exception('L\'id de la tâche doit être un entier');
        if ($id <= 0) throw new \Exception('L\'id de la tâche doit être supérieur à 0');

        $this->id = $id;
    }

    /**
     * Retourne le nom de l'enclos.
     * @return string Le nom de l'enclos.
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * Définit le nom de l'enclos.
     * Valide que le nom est non vide et respecte une longueur minimale et maximale.
     * @param string $name Le nom à définir.
     * @throws \Exception Si le nom est invalide.
     */

    public function setName($name)
    {
        if (empty($name)) throw new \Exception("Le nom de l'enclos est obligatoire");
        if (strlen($name) < 3) throw new \Exception("Le nom de l'enclos doit contenir au moins 3 caractères");
        if (strlen($name) > 50) throw new \Exception("Le nom de l'enclos doit contenir au plus 50 caractères");

        $this->name = htmlspecialchars($name);
    }

    /**
     * Retourne la description de l'enclos.
     * @return string La description de l'enclos.
     */

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Définit la description de l'enclos.
     * Valide que la description respecte une longueur minimale et maximale.
     * @param string $description La description à définir.
     * @throws \Exception Si la description est invalide.
     */

    public function setDescription($description)
    {
        if (empty($description)) throw new \Exception("La description de l'enclos est nécessaire");
        if (strlen($description) < 3) throw new \Exception("La description de l'enclos doit contenir au moins 3 caractères");
        if (strlen($description) > 200) throw new \Exception("La descripion de l'enclos doit contenir au plus 200 caractères");

        $this->description = htmlspecialchars($description);
    }

    /**
     * Retourne la date de création de l'enclos.
     * @return mixed La date de création.
     */

    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Définit la date de création de l'enclos.
     * Valide que cette information est non vide.
     * @param mixed $created_at La date de création à définir.
     * @throws \Exception Si la date est invalide.
     */

    public function setCreated_at($created_at)
    {
        if (empty($created_at)) throw new \Exception("La date de création est obligatoire");
    }

    /**
     * Récupère la liste de tous les enclos.
     * Effectue une requête SQL pour obtenir tous les enregistrements de la table `enclos`.
     * @return array|false Un tableau associatif contenant les données des enclos, ou `false` si aucun enclos n'est trouvé.
     * @throws \PDOException En cas d'erreur SQL.
     */

    public function showEnclosure()
    {
        $stmt = $this->db->query('SELECT * FROM `enclos`');
        return $stmt->fetchAll();
    }

    /**
     * Récupère les informations de l'enclos en fonction de son identifiant.
     * Effectue une requête SQL pour rechercher l'enclos correspondant à l'ID défini.
     * @return array|false Les données de l'enclos sous forme de tableau associatif, ou `false` si aucun résultat.
     * @throws \PDOException En cas d'erreur SQL.
     */

    public function showEnclosureID()
    {
        $stmt = $this->db->prepare('SELECT * FROM `enclos` WHERE `id` = :id');
        $stmt->bindValue(':id', $this->id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Ajoute un nouveau enclos dans la base de données.
     * Insère un nouvel enregistrement dans la table `enclos` avec les informations définies dans l'objet.
     * @return bool `true` si l'insertion a réussi, sinon `false`.
     * @throws \PDOException En cas d'erreur SQL.
     */

    public function addEnclosure()
    {
        $sql = 'INSERT INTO `enclos` (`name`, `description`) VALUES (:name, :description)';
        $sth = $this->db->prepare($sql);
        $sth->bindValue(':name', $this->name, \PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, \PDO::PARAM_STR);

        return $sth->execute();
    }

    /**
     * Met à jour les informations d'un enclos dans la base de données.
     * Effectue une mise à jour des colonnes `name` et `description`pour l'enclos correspondant à l'ID.
     * @return bool `true` si la mise à jour a réussi, sinon `false`.
     * @throws \PDOException En cas d'erreur SQL.
     */

    public function updateEnclosure()
    {

        $sql = 'UPDATE `enclos` SET `name`= :name, `description`= :description WHERE `id` = :id';
        $sth = $this->db->prepare($sql);
        $sth->bindValue(':name', $this->name, \PDO::PARAM_STR);
        $sth->bindValue(':description', $this->description, \PDO::PARAM_STR);
        $sth->bindValue(':id', $this->id, \PDO::PARAM_INT);

        return $sth->execute();
    }

    /**
     * Supprime un enclos de la base de données à partir de son ID.
     * Effectue une suppression de l'enregistrement correspondant à l'ID dans la table `enclos`.
     * @return bool `true` si la suppression a réussi, sinon `false`.
     * @throws \PDOException En cas d'erreur SQL.
     */
    public function deleteEnclosure()
    {
        $stmt = $this->db->prepare('DELETE FROM `enclos` WHERE `id` = ?');
        return $stmt->execute([$this->id]);
    }
}
