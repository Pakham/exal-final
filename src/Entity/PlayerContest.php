<?php

namespace App\Entity;

use App\Repository\PlayerContestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerContestRepository::class)
 */
class PlayerContest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $player_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $contest_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerId(): ?int
    {
        return $this->player_id;
    }

    public function setPlayerId(int $player_id): self
    {
        $this->player_id = $player_id;

        return $this;
    }

    public function getContestId(): ?int
    {
        return $this->contest_id;
    }

    public function setContestId(int $contest_id): self
    {
        $this->contest_id = $contest_id;

        return $this;
    }
}
