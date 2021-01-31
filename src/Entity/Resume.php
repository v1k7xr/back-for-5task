<?php

namespace App\Entity;

use App\Repository\ResumeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResumeRepository::class)
 */
class Resume
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
    private $fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $resumeStatus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profession;

    /**
     * @ORM\Column(type="string", length=1100)
     */
    private $imageURL;

    /**
     * @ORM\Column(type="date")
     */
    private $dateBirth;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $educationType;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $educationList = [];

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $skills;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getResumeStatus(): ?string
    {
        return $this->resumeStatus;
    }

    public function setResumeStatus(string $resumeStatus): self
    {
        $this->resumeStatus = $resumeStatus;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getImageURL(): ?string
    {
        return $this->imageURL;
    }

    public function setImageURL(string $imageURL): self
    {
        $this->imageURL = $imageURL;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(\DateTimeInterface $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getEducationType(): ?string
    {
        return $this->educationType;
    }

    public function setEducationType(string $educationType): self
    {
        $this->educationType = $educationType;

        return $this;
    }

    public function getEducationList(): ?array
    {
        return $this->educationList;
    }

    public function setEducationList(?array $educationList): self
    {
        $this->educationList = $educationList;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(string $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'fullname' => $this->getFullname(),
            'city' => $this->getCity(),
            'email' => $this->getEmail(),
            'phoneNumber' => $this->getPhoneNumber(),
            'resumeStatus' => $this->getResumeStatus(),
            'profession' => $this->getProfession(),
            'imageURL' => $this->getImageURL(),
            'dateBirth' => $this->getDateBirth(),
            'educationType' => $this->getEducationType(),
            'educationList' => $this->getEducationList(),
            'salary' => $this->getSalary(),
            'skills' => $this->getSkills(),
            'about' => $this->getAbout(),
        ];
    }
}
