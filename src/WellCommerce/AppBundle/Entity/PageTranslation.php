<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\AppBundle\Entity;

use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use WellCommerce\AppBundle\Entity\Behaviours\RoutableTrait;
use WellCommerce\AppBundle\Entity\RoutableSubjectInterface;
use WellCommerce\AppBundle\Entity\LocaleAwareInterface;
use WellCommerce\AppBundle\Entity\Meta;

/**
 * Class PageTranslation
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class PageTranslation implements RoutableSubjectInterface, LocaleAwareInterface
{
    use Translation;
    use RoutableTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var PageRoute
     */
    protected $route;

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->meta = new Meta();
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param Meta $meta
     */
    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return PageRoute|\WellCommerce\AppBundle\Entity\RouteInterface
     */
    public function getRouteEntity()
    {
        return new PageRoute();
    }
}