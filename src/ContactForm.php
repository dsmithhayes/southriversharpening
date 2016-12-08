<?php

namespace SouthRiverSharpening;

use Interop\Container\ContainerInterface as Container;

class ContactForm
{
    /**
     * @var string
     *      The address of where the form is going
     */
    private $to;

    /**
     * @var string
     *      The name of the person sending the message
     */
    private $fromName;

    /**
     * @var string
     *      The email of the person sending the message
     */
    private $fromEmail;

    /**
     * @var string
     *      The authored message to email
     */
    private $message;

    /**
     * @param \Interop\Container\ContainerInterface $container
     *      The application container, containing the request
     */
    public function __construct(Container $container)
    {

    }

    /**
     * Sends the actual email
     */
    public function send()
    {

    }
}
