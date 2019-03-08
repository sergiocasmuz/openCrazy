<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ViajesRepository")
 */
class Viajes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $salida;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hasta;

    /**
     * @ORM\Column(type="datetime")
     */
    private $llegada;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CuentasCorrientes", inversedBy="viajes")
     */
    private $cuentaCorriente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Choferes", inversedBy="viajes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chofer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalida(): ?\DateTimeInterface
    {
        return $this->salida;
    }

    public function setSalida(\DateTimeInterface $salida): self
    {
        $this->salida = $salida;

        return $this;
    }

    public function getDesde(): ?string
    {
        return $this->desde;
    }

    public function setDesde(?string $desde): self
    {
        $this->desde = $desde;

        return $this;
    }

    public function getHasta(): ?string
    {
        return $this->hasta;
    }

    public function setHasta(string $hasta): self
    {
        $this->hasta = $hasta;

        return $this;
    }

    public function getLlegada(): ?\DateTimeInterface
    {
        return $this->llegada;
    }

    public function setLlegada(\DateTimeInterface $llegada): self
    {
        $this->llegada = $llegada;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getCuentaCorriente(): ?CuentasCorrientes
    {
        return $this->cuentaCorriente;
    }

    public function setCuentaCorriente(?CuentasCorrientes $cuentaCorriente): self
    {
        $this->cuentaCorriente = $cuentaCorriente;

        return $this;
    }

    public function getChofer(): ?Choferes
    {
        return $this->chofer;
    }

    public function setChofer(?Choferes $chofer): self
    {
        $this->chofer = $chofer;

        return $this;
    }
}
