<?php
require_once 'models/Database.php';
class Enclosure extends Database
{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $created_by;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (empty($id)) throw new Exception('L\'id de la tâche est obligatoire');
        if (!is_numeric($id)) throw new Exception('L\'id de la tâche doit être un entier');
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new Exception('L\'id de la tâche doit être un entier');
        if ($id <= 0) throw new Exception('L\'id de la tâche doit être supérieur à 0');

        $this->id = $id;
    }

    public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		if (empty($name)) throw new Exception("Le nom de l'enclos est obligatoire");
		if (strlen($name) < 3) throw new Exception("Le nom de l'enclos doit contenir au moins 3 caractères");
		if (strlen($name) > 50) throw new Exception("Le nom de l'enclos doit contenir au plus 50 caractères");

		$this->name = htmlspecialchars($name);
	}

    public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		if (empty($description)) throw new Exception("La description de l'enclos est nécessaire");
		if (strlen($description) < 3) throw new Exception("La description de l'enclos doit contenir au moins 3 caractères");
		if (strlen($description) > 200) throw new Exception("La descripion de l'enclos doit contenir au plus 200 caractères");

		$this->description = htmlspecialchars($description);
	}
}
