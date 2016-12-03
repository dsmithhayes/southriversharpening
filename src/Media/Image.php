<?php

namespace SouthRiverSharpening\Media;

use Extended\File\File;

/**
 * The Image class is an open file handle that utilizes the imagick methods to
 * get information about the image being opened.
 */
class Image extends File
{
    /**
     * @var string
     *      The regular expression for matching file extensions.
     */
    const EXTENSION_REGEX = '/\.(png|jpg|jpeg|bmp|tiff|gif|svg)$/';

    /**
     * @var int
     *      The width in pixels of the image.
     */
    protected $width;

    /**
     * @var int
     *      The height in pixels of the image.
     */
    protected $height;

    /**
     * @see \Extended\File\File
     *
     * After the file is opened, perform imagick functions to fill out the meta
     * of the file.
     */
    public function __construct($path, $mode = 'w+', $buffer = null)
    {
        parent::__construct($path, $mode, $buffer);

        // get the Width and Height
    }

    /**
     * @return int
     *      The width in pixels of the image.
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *      The new width in pixels to set for the image.
     */
    public function setWidth(int $width)
    {

        return $this;
    }

    /**
     * @return int
     *      The height in pixels of the image.
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *      The new height in pixels to set for the image.
     */
    public function setHeight(int $height)
    {

        return $this;
    }
}
