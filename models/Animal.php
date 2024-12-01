<?php

namespace App\models;

require_once __DIR__ . '/Database.php';

/**
 * Classe Animal
 * Représente un animal avec des informations telles que son identifiant, son nom, sa description, son espèce,
 * l'identifiant de son créateur et l'enclos associé.
 */

class Animal extends Database
{
	/**
	 * @var int $id Identifiant unique de l'animal.
	 */
	private int $id;

	/**
	 * @var string $name Nom de l'animal.
	 */
	private string $name;

	/**
	 * @var string $description Description de l'animal.
	 */
	private string $description;

	/**
	 * @var string $espece Espèce de l'animal.
	 */
	private string $espece;

	/**
	 * @var mixed $created_by Identifiant de la personne ayant créé cet enregistrement.
	 */
	private $created_at;

	/**
	 * @var int $enclos_id Identifiant de l'enclos associé à l'animal.
	 */
	private int $enclos_id;

	/**
	 * Retourne l'identifiant unique de l'animal.
	 * @return int L'identifiant de l'animal.
	 */

	public function getId()
	{
		return $this->id;
	}

	/**
	 * Définit l'identifiant unique de l'animal.
	 * Valide que l'identifiant est un entier strictement positif.
	 * @param mixed $id L'identifiant à définir.
	 * @throws \Exception Si l'identifiant est invalide.
	 */

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

	/**
	 * Retourne le nom unique de l'animal.
	 * @return int Le nom de l'animal.
	 */

	public function getName()
	{
		return $this->name;
	}

	/**
	 * Définit le nom unique de l'animal.
	 * Valide que le nom n'est pas vide.
	 * @param string $name Le nom à définir.
	 * @throws \Exception Si le nom est vide.
	 */

	public function setName($name)
	{
		if (empty($name)) throw new \Exception("Le nom de l'animal est obligatoire");
		if (strlen($name) < 3) throw new \Exception("Le nom de l'animal doit contenir au moins 3 caractères");
		if (strlen($name) > 50) throw new \Exception("Le nom de l'animal doit contenir au plus 50 caractères");

		$this->name = htmlspecialchars($name);
	}

	/**
	 * Retourne la description unique de l'animal.
	 * @return int La description de l'animal.
	 */

	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Définit la description unique de l'animal.
	 * Valide que la description n'est pas vide.
	 * @param string $description La description à définir.
	 * @throws \Exception Si la description est vide.
	 */

	public function setDescription($description)
	{
		if (empty($description)) throw new \Exception("La description de l'animal est nécessaire");
		if (strlen($description) < 3) throw new \Exception("La description de l'animal doit contenir au moins 3 caractères");
		if (strlen($description) > 200) throw new \Exception("La descripion de l'animal doit contenir au plus 200 caractères");

		$this->description = htmlspecialchars($description);
	}

	/**
	 * Retourne l'espèce unique de l'animal.
	 * @return int L'espèce de l'animal.
	 */

	public function getEspece()
	{
		return $this->espece;
	}

	/**
	 * Définit l'espèce unique de l'animal.
	 * Valide que l'espèce n'est pas vide.
	 * @param string $espece L'espèce à définir.
	 * @throws \Exception Si l'espèce est vide.
	 */

	public function setEspece($espece)
	{
		if (empty($espece)) throw new \Exception("L'espèce de l'animal est obligatoire");
		if (strlen($espece) < 3) throw new \Exception("L'espèce de l'animal doit contenir au moins 3 caractères");
		if (strlen($espece) > 50) throw new \Exception("L'espèce de l'animal doit contenir au plus 50 caractères");

		$this->espece = htmlspecialchars($espece);
	}

	/**
	 * Retourne la date de création.
	 * @return mixed La date de création.
	 */

	public function getCreated_at()
	{
		return $this->created_at;
	}

	/**
	 * Définit la date de création.
	 * Valide que cette information n'est pas vide.
	 * @param mixed $created_at La date de création à définir.
	 * @throws \Exception Si la valeur est vide.
	 */

	public function setCreated_at($created_at)
	{
		if (empty($created_at)) throw new \Exception("La date de création est obligatoire");
	}

	/**
	 * Retourne l'identifiant de l'enclos associé à l'animal.
	 * @return int L'identifiant de l'enclos.
	 */

	public function getEnclosId()
	{
		return $this->enclos_id;
	}

	/**
	 * Définit l'identifiant de l'enclos associé à l'animal.
	 * Valide que l'identifiant est un entier strictement positif.
	 * @param mixed $enclos_id L'identifiant de l'enclos à définir.
	 * @throws \Exception Si l'identifiant est invalide.
	 */

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

	/**
	 * Récupère les informations de l'animal en fonction de son identifiant.
	 * Effectue une requête SQL pour rechercher l'animal correspondant à l'ID défini.
	 * @return array|false Les données de l'animal sous forme de tableau associatif, ou `false` si aucun résultat.
	 * @throws \PDOException En cas d'erreur SQL.
	 */

	public function showAnimalID()
	{
		$stmt = $this->db->prepare('SELECT * FROM `animaux` WHERE `id` = :id');
		$stmt->bindValue(':id', $this->id, \PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	/**
	 * Récupère tous les animaux associés à un enclos spécifique.
	 * Effectue une requête SQL pour rechercher les animaux avec un enclos_id correspondant.
	 * @return array|false Une liste des animaux sous forme de tableau associatif, ou `false` si aucun résultat.
	 * @throws \PDOException En cas d'erreur SQL.
	 */

	public function showAnimalEnclosureID()
	{
		$stmt = $this->db->prepare('SELECT * FROM `animaux` WHERE `enclos_id` = :enclos_id');
		$stmt->bindValue(':enclos_id', $this->enclos_id, \PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	/**
	 * Ajoute un nouvel animal dans la base de données.
	 * Insère un nouvel enregistrement dans la table `animaux` avec les informations définies dans l'objet.
	 * @return bool `true` si l'insertion a réussi, sinon `false`.
	 * @throws \PDOException En cas d'erreur SQL.
	 */

	public function addAnimal()
	{
		$sql = 'INSERT INTO `animaux` (`name`, `description`, `espece`, `enclos_id`) VALUES (:name, :description, :espece, :enclos_id)';
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':name', $this->name, \PDO::PARAM_STR);
		$sth->bindValue(':description', $this->description, \PDO::PARAM_STR);
		$sth->bindValue(':espece', $this->espece, \PDO::PARAM_STR);
		$sth->bindValue(':enclos_id', $this->enclos_id, \PDO::PARAM_INT);

		return $sth->execute();
	}

	/**
	 * Met à jour les informations d'un animal dans la base de données.
	 * Effectue une mise à jour des colonnes `name`, `description`, et `espece` pour l'animal correspondant à l'ID.
	 * @return bool `true` si la mise à jour a réussi, sinon `false`.
	 * @throws \PDOException En cas d'erreur SQL.
	 */

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
	 * Supprime un animal de la base de données à partir de son ID.
	 * Effectue une suppression de l'enregistrement correspondant à l'ID dans la table `animaux`.
	 * @return bool `true` si la suppression a réussi, sinon `false`.
	 * @throws \PDOException En cas d'erreur SQL.
	 */
	public function deleteAnimal()
	{
		$stmt = $this->db->prepare('DELETE FROM `animaux` WHERE `id` = ?');
		return $stmt->execute([$this->id]);
	}
}
