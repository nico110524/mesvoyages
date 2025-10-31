<?php

namespace App\Entity;


class Contact {
    #[Assert\NoBlank()]
    #[Assert\Length(min:2, max:100)]
    private ?string $nom;
    
    #[Assert\NoBlank()]
    #[Assert\Email()]
    private ?string $email;
    
    #[Assert\NoNlank()]
    private ?string $message;
    
    public function getNom(): ?string {
        return $this->nom;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

    public function setNom(?string $nom): self {
        $this->nom = $nom;
        return $this;
    }

    public function setEmail(?string $email): self {
        $this->email = $email;
        return $this;
    }

    public function setMessage(?string $message): self {
        $this->message = $message;
        return $this;
    }


}
