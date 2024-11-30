<?php
namespace App\models;

require_once __DIR__. '/Database.php';
class Enclosure extends Database
{
    private int $id;
    private string $name;
    private string $description;
    private $created_by;

    public function getId()
    {
        return $this->id;
    }

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

    public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		if (empty($name)) throw new \Exception("Le nom de l'enclos est obligatoire");
		if (strlen($name) < 3) throw new \Exception("Le nom de l'enclos doit contenir au moins 3 caractères");
		if (strlen($name) > 50) throw new \Exception("Le nom de l'enclos doit contenir au plus 50 caractères");

		$this->name = htmlspecialchars($name);
	}

    public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		if (empty($description)) throw new \Exception("La description de l'enclos est nécessaire");
		if (strlen($description) < 3) throw new \Exception("La description de l'enclos doit contenir au moins 3 caractères");
		if (strlen($description) > 200) throw new \Exception("La descripion de l'enclos doit contenir au plus 200 caractères");

		$this->description = htmlspecialchars($description);
	}

    public function getCreated_by() {
        return $this->created_by;
    }

    public function setCreated_by($created_by) {
        if (empty($created_by)) throw new \Exception("La date de création est obligatoire");
    }


    /**
     * Fonction affichant tous les enclos avec toutes leurs variables de la table 'enclos' de la base de données
     */
    public function showEnclosure() {
        $stmt = $this->db->query('SELECT * FROM `enclos`');
        return $stmt->fetchAll();
    }

    public function showEnclosureID()
	{
		$stmt = $this->db->prepare('SELECT * FROM `enclos` WHERE `id` = :id');
		$stmt->bindValue(':id', $this->id, \PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

    /**
     * Fonction permettant d'ajouter des tâches en fonction du nom, de l'id de la catégorie et de la description.
     * Ajout des valeurs dans la table 'tasks' de la base de données
     */
    public function addEnclosure() {
        $sql = 'INSERT INTO `enclos` (`name`, `description`) VALUES (:name, :description)';
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':name', $this->name, \PDO::PARAM_STR);
		$sth->bindValue(':description', $this->description, \PDO::PARAM_STR);

		return $sth->execute();
    }

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
     * Fonction permettant de supprimer un enclos depuis son ID
     */
	public function deleteEnclosure()
	{
		$stmt = $this->db->prepare('DELETE FROM `enclos` WHERE `id` = ?');
		return $stmt->execute([$this->id]);
	}

}
