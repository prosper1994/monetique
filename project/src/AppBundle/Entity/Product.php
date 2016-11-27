<?php
/**
 * Created by PhpStorm.
 * User: kazebushi
 * Date: 30/10/16
 * Time: 17:38
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ref_provider;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $provider_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $category;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set refProvider
     *
     * @param integer $refProvider
     *
     * @return Product
     */
    public function setRefProvider($refProvider)
    {
        $this->ref_provider = $refProvider;

        return $this;
    }

    /**
     * Get refProvider
     *
     * @return integer
     */
    public function getRefProvider()
    {
        return $this->ref_provider;
    }

    /**
     * Set providerName
     *
     * @param string $providerName
     *
     * @return Product
     */
    public function setProviderName($providerName)
    {
        $this->provider_name = $providerName;

        return $this;
    }

    /**
     * Get providerName
     *
     * @return string
     */
    public function getProviderName()
    {
        return $this->provider_name;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
}
