<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CuentasCorrientesRepository")
 */
class CuentasCorrientes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni): void
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dni;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        $this->tel = $tel;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Viajes", mappedBy="cuentaCorriente")
     */
    private $viajes;

    public function __construct()
    {
        $this->viajes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Viajes[]
     */
    public function getViajes(): Collection
    {
        return $this->viajes;
    }

    public function addViaje(Viajes $viaje): self
    {
        if (!$this->viajes->contains($viaje)) {
            $this->viajes[] = $viaje;
            $viaje->setCuentaCorriente($this);
        }

        return $this;
    }

    public function removeViaje(Viajes $viaje): self
    {
        if ($this->viajes->contains($viaje)) {
            $this->viajes->removeElement($viaje);
            // set the owning side to null (unless already changed)
            if ($viaje->getCuentaCorriente() === $this) {
                $viaje->setCuentaCorriente(null);
            }
        }

        return $this;
    }
}
