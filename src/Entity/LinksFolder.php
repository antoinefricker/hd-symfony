<?php

namespace App\Entity;

use App\Repository\LinksFolderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ ORM\Entity( repositoryClass: LinksFolderRepository::class ) ]

class LinksFolder {
    #[ ORM\Id ]
    #[ ORM\GeneratedValue ]
    #[ ORM\Column ]
    private ?int $id = null;

    #[ ORM\Column( length: 255 ) ]
    private ?string $display_name = null;

    /**
    * @var Collection<int, Link>
    */
    #[ ORM\ManyToMany( targetEntity: Link::class ) ]
    private Collection $links;

    /**
    * @var Collection<int, Admin>
    */
    #[ ORM\ManyToMany( targetEntity: Admin::class ) ]
    private Collection $owners;

    #[ ORM\Column( length: 7 ) ]
    private ?string $color = null;

    #[ ORM\Column( length: 64 ) ]
    private ?string $icon = null;

    public function __construct() {
        $this->links = new ArrayCollection();
        $this->owners = new ArrayCollection();
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

    /**
    * @return Collection<int, Link>
    */

    public function getLinks(): Collection {
        return $this->links;
    }

    public function addLink( Link $link ): static {
        if ( !$this->links->contains( $link ) ) {
            $this->links->add( $link );
        }

        return $this;
    }

    public function removeLink( Link $link ): static {
        $this->links->removeElement( $link );

        return $this;
    }

    /**
    * @return Collection<int, Admin>
    */

    public function getOwners(): Collection {
        return $this->owners;
    }

    public function addOwner( Admin $owner ): static {
        if ( !$this->owners->contains( $owner ) ) {
            $this->owners->add( $owner );
        }

        return $this;
    }

    public function removeOwner( Admin $owner ): static {
        $this->owners->removeElement( $owner );

        return $this;
    }

    public function getColor(): ?string {
        return $this->color;
    }

    public function setColor( string $color ): static {
        $this->color = $color;

        return $this;
    }

    public function getIcon(): ?string {
        return $this->icon;
    }

    public function setIcon( string $icon ): static {
        $this->icon = $icon;

        return $this;
    }
}
