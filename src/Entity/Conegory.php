<?php

namespace App\Entity;

use App\Repository\ConegoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConegoryRepository::class)
 */
class Conegory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="conegory")
     */
    private $Jobs;

    public function __construct()
    {
        $this->Jobs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobs(): Collection
    {
        return $this->Jobs;
    }

    public function addJob(Job $job): self
    {
        if (!$this->Jobs->contains($job)) {
            $this->Jobs[] = $job;
            $job->setConegory($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->Jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getConegory() === $this) {
                $job->setConegory(null);
            }
        }

        return $this;
    }
}
