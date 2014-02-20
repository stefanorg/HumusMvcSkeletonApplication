<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* entity test per riccardino
*
* @ORM\Entity
*/
class Test
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\Column()*/
    private $nome;
    /** @ORM\Column()*/
    private $cognome;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of cognome.
     *
     * @return mixed
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * Sets the value of cognome.
     *
     * @param mixed $cognome the cognome
     *
     * @return self
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;

        return $this;
    }
}