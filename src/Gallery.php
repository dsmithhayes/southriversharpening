<?php

/**
 * @author Dave Smith-Hayes <me@davesmithhayes.com>
 */

namespace SouthRiverSharpening;

/**
 * This class will read through images and put together a list of locations and
 * sizes for the image gallery.
 */
class Gallery
{
    /**
     * @var string
     *      The regular expression that matches image file extensions
     */
    const IMAGE_REGEX = '/\.(png|jpg|jpeg|bmp|tiff|gif|svg)$/';

    /**
     * @var string
     *      Where on the filesystem the photos are
     */
    private $location;

    /**
     * @var \Imagick
     *      Instance of a Imagick object for processing all of the images
     */
    private $imagick;

    /**
     * @param string $location
     *      The location of the images on the file system
     */
    public function __construct(string $location)
    {
        $this->location = $location;
        $this->imagick = new Imagick($this->readDir());
    }

    /**
     * @param string $location
     *      Set the location of the image gallery
     * @return \SouthRiverSharpening\Gallery
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return array
     *      Contents of the directory
     */
    public function readDir(): array
    {
        $imageList = [];

        foreach (scandir($this->location) as $image) {
            if (preg_match(self::IMAGE_REGEX, $image)) {
                $imageList[] = $image;
            }
        }

        return $imageList;
    }
}
