<?php

namespace App\Entity;

use App\Repository\LinkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ ORM\Entity( repositoryClass: LinkRepository::class ) ]

class Link {
    #[ ORM\Id ]
    #[ ORM\GeneratedValue ]
    #[ ORM\Column ]
    private ?int $id = null;

    #[ ORM\Column( length: 255 ) ]
    private ?string $display_name = null;

    #[ ORM\Column( length: 255 ) ]
    private ?string $url = null;

    #[ ORM\Column( length: 64, nullable: true ) ]
    private ?string $trigger = null;

    #[ ORM\Column( length: 255, nullable: true ) ]
    private ?string $search_url = null;

    public function __toString() {
        return $this->display_name;

    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getDisplayName(): ?string {
        return $this->display_name;
    }

    public function setDisplayName( string $display_name ): static {
        $this->display_name = $display_name;

        return $this;
    }

    public function getUrl(): ?string  {
        return $this->url;
    }

    public function setUrl( string $url ): static {
        $this->url = $url;

        return $this;
    }

    public function getTrigger(): ?string {
        return $this->trigger;
    }

    public function setTrigger( ?string $trigger ): static {
        $this->trigger = $trigger;

        return $this;
    }

    public function getSearchUrl(): ?string {
        return $this->search_url;
    }

    public function setSearchUrl( ?string $search_url ): static {
        $this->search_url = $search_url;

        return $this;
    }
}
