<?php 
namespace App\models;
require_once __DIR__. '/Database.php';

class Animal extends Database {
    private int $id;
    private string $name;
    private string $description;
    private string $espece;
    private $created_by;
    private int $enclos_id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (empty($id)) throw new \Exception('L\'id de l\'animal est obligatoire');
        if (!is_numeric($id)) throw new \Exception('L\'id de l\'animal doit être un entier');
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new \Exception('L\'id de l\'animal doit être un entier');
        if ($id <= 0) throw new \Exception('L\'id de l\'animal doit être supérieur à 0');

        $this->id = $id;
    }

    public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		if (empty($name)) throw new \Exception("Le nom de l'animal est obligatoire");
		if (strlen($name) < 3) throw new \Exception("Le nom de l'animal doit contenir au moins 3 caractères");
		if (strlen($name) > 50) throw new \Exception("Le nom de l'animal doit contenir au plus 50 caractères");

		$this->name = htmlspecialchars($name);
	}

    public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		if (empty($description)) throw new \Exception("La description de l'animal est nécessaire");
		if (strlen($description) < 3) throw new \Exception("La description de l'animal doit contenir au moins 3 caractères");
		if (strlen($description) > 200) throw new \Exception("La descripion de l'animal doit contenir au plus 200 caractères");

		$this->description = htmlspecialchars($description);
	}

    public function getEspece()
	{
		return $this->espece;
	}

	public function setEspece($espece)
	{
		if (empty($espece)) throw new \Exception("L'espèce de l'animal est obligatoire");
		if (strlen($espece) < 3) throw new \Exception("L'espèce de l'animal doit contenir au moins 3 caractères");
		if (strlen($espece) > 50) throw new \Exception("L'espèce de l'animal doit contenir au plus 50 caractères");

		$this->espece = htmlspecialchars($espece);
	}

    public function getCreated_by() {
        return $this->created_by;
    }

    public function setCreated_by($created_by) {
        if (empty($created_by)) throw new \Exception("La date de création est obligatoire");
    }

    public function getEnclosId()
    {
        return $this->enclos_id;
    }

    public function setEnclosId($enclos_id)
    {
        if (empty($enclos_id)) throw new \Exception('L\'id de l\'enclos est obligatoire');
        if (!is_numeric($enclos_id)) throw new \Exception('L\'id de l\'enclos doit être un entier');
        $floatVal = floatval($enclos_id);
        $enclos_id = intval($enclos_id);
        if ($enclos_id != $floatVal) throw new \Exception('L\'id de l\'enclos doit être un entier');
        if ($enclos_id <= 0) throw new \Exception('L\'id de l\'enclos doit être supérieur à 0');

        $this->enclos_id = $enclos_id;
    }

    public function showAnimalID()
	{
		$stmt = $this->db->prepare('SELECT * FROM `animaux` WHERE `id` = :id');
		$stmt->bindValue(':id', $this->id, \PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

    public function showAnimalEnclosureID()
	{
		$stmt = $this->db->prepare('SELECT * FROM `animaux` WHERE `enclos_id` = :enclos_id');
		$stmt->bindValue(':enclos_id', $this->enclos_id, \PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

    public function addAnimal() {
        $sql = 'INSERT INTO `animaux` (`name`, `description`, `espece`, `enclos_id`) VALUES (:name, :description, :espece, :enclos_id)';
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':name', $this->name, \PDO::PARAM_STR);
		$sth->bindValue(':description', $this->description, \PDO::PARAM_STR);
		$sth->bindValue(':espece', $this->espece, \PDO::PARAM_STR);
        $sth->bindValue(':enclos_id', $this->enclos_id, \PDO::PARAM_INT);

		return $sth->execute();
    }

    public function updateAnimal()
	{

		$sql = 'UPDATE `animaux` SET `name`= :name, `description`= :description, `espece` = :espece WHERE `id` = :id';
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':name', $this->name, \PDO::PARAM_STR);
		$sth->bindValue(':description', $this->description, \PDO::PARAM_STR);
        $sth->bindValue(':espece', $this->espece, \PDO::PARAM_STR);
		$sth->bindValue(':id', $this->id, \PDO::PARAM_INT);

		return $sth->execute();
	}

    /**
     * Fonction permettant de supprimer un animal depuis son ID
     */
	public function deleteAnimal()
	{
		$stmt = $this->db->prepare('DELETE FROM `animaux` WHERE `id` = ?');
		return $stmt->execute([$this->id]);
	}
}


?>