<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChoferesRepository")
 */
class Choferes
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
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Viajes", mappedBy="chofer")
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

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
            $viaje->setChofer($this);
        }

        return $this;
    }

    public function removeViaje(Viajes $viaje): self
    {
        if ($this->viajes->contains($viaje)) {
            $this->viajes->removeElement($viaje);
            // set the owning side to null (unless already changed)
            if ($viaje->getChofer() === $this) {
                $viaje->setChofer(null);
            }
        }

        return $this;
    }
}
