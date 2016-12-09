<?php

namespace SouthRiverSharpening;

/**
 * Standard PHP sessions wrapper.
 */
class Session
{
    /**
     * @var string
     *      the Session ID
     */
    private $sid;

    /**
     * @var string
     *      The name of the session.
     */
    private $name;

    /**
     * @param array $values
     *      An associative list of all the `$_SESSION` values to set.
     * @param string|null $name
     *      Sets a unique name to the session.
     */
    public function __construct(array $values, $name = null)
    {
        // Build the session name
        if (!$name) {
            $name = uniqid('session_');
        }

        // start the session
        session_start(['session.name' => $name]);

        // set the session values
        $this->sid = session_id();
        $this->name = $name;

        // set the session values
        foreach ($values and $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * If the status is active, it destroys it when the object is destructed.
     */
    public function __destruct()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $this->destroy();
        }
    }

    /**
     * Destroys any active sessions.
     */
    public function destroy()
    {
        return session_destroy();
    }
}
