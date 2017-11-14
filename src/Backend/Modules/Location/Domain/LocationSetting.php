<?php

namespace Backend\Modules\Location\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="location_settings")
 * @ORM\Entity
 */
class LocationSetting
{
    /**
     * @var Location
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Backend\Modules\Location\Domain\Location", inversedBy="settings")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="string", length=180)
     */
    private $name;

    /**
     * @var mixed
     *
     * @ORM\Column(type="object")
     */
    private $value;

    public function __construct(Location $location, string $name, $value)
    {
        $this->location = $location;
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function update($value): void
    {
        $this->value = $value;
    }
}
