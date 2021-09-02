<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 * @UniqueEntity(
 *     fields={"title", "isbn"},
 *     errorPath="entity",
 *     message="There are another book with the same title and isbn exist, please choose an appropriate params."
 * )
 * @UniqueEntity(
 *     fields={"isbn", "publish_year"},
 *     errorPath="entity",
 *     message="There are another book with the same title and publish year exist, please choose an appropriate params."
 * )
 */
class Books
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
    private $title;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 2021
     * )
     */
    private $publish_year;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $isbn;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 10000
     * )
     */
    private $pages;

    /**
     * @ORM\OneToMany(targetEntity=BookAuthors::class, mappedBy="book", orphanRemoval=true)
     */
    private $authors;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString():string
    {
        return $this->getTitle();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPublishYear(): ?int
    {
        return $this->publish_year;
    }

    public function setPublishYear(int $publish_year): self
    {
        $this->publish_year = $publish_year;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(int $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return Collection|BookAuthors[]
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(BookAuthors $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
            $author->setBook($this);
        }

        return $this;
    }

    public function removeAuthor(BookAuthors $author): self
    {
        if ($this->authors->removeElement($author)) {
            // set the owning side to null (unless already changed)
            if ($author->getBook() === $this) {
                $author->setBook(null);
            }
        }

        return $this;
    }

//    /**
//     * @Assert\IsTrue(message="The password cannot match your first name")
//     */
//    public function checkUniqueBook(): bool
//    {
//
//    }
}
