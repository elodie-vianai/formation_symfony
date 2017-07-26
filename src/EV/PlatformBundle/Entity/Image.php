<?php

namespace EV\PlatformBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="EV\PlatformBundle\Repository\ImageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     * @Assert\Image()
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @var UploadedFile
     *
     * @Assert\File()
     */
    private $file;

    /**
     * temporary file
     */
    private $tempFileName;


    /************************************************************************************************************************/

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload(){
        // S'il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file){
            return;
        }

        // Nom du fichier est l'id, il faut juste stocker sont extension
        $this->url = $this->file->guessExtension();

        //Génération de l'attribut alt de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
        $this->alt = $this->file->getClientOriginalName();
    }
    /**
     * Upload a file image
     *
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        // S'il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file){
            return;
        }

        // S'il y un ancien fichier, on le supprime
        if (null !== $this->tempFileName) {
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFileName;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        // Déplacement du fichier envoyé dans le répertoire de notre choix
        $this->file->move(
            $this->getUploadRootDir(),      //répertoire de destination
            $this->id.'.'.$this->url        //le nom du fichier ) créer, ici "id.extension"
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        // Sauvegarde temporaire du nom du fichier, car il dépend de l'id
        $this->tempFileName = $this->getUploadRootDir().'/'.$this->id.'.'.$this->url;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        // En PostRemove, il n'y a pas d'accès à l'id donc on utilise le nom sauvegardé
        if (file_exists($this->tempFileName)) {
            unlink($this->tempFileName);        // Suppression du fichier
        }
    }

    public function getUploadDir(){
        // Retour du chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'uploads/img';
    }

    public function getUploadRootDir() {
        // Retour du chemin relatif vers l'image pour le code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath(){
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getUrl();
    }
    /************************************************************************************************************************/


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        // Vérification d'un éventuel fichier doublon
        if (null !== $this->url) {
            $this->tempFileName = $this->url;       //sauvegarde de l'extension du fichier pour le supprimer plus tard
            $this->url = null;                      // réinitialisation des valeurs des attributs url et alt
            $this->alt = null;                      // réinitialisation des valeurs des attributs url et alt
        }
    }

}

