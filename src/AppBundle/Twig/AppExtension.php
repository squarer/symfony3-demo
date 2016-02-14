<?php

namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    /**
     * @var \Predis\Client
     */
    private $redis;

    /**
     * @param \Predis\Client $redis
     */
    public function setRedis($redis)
    {
        $this->redis = $redis;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('hasSession', [$this, 'hasSession']),
            new \Twig_SimpleFunction('userInfo', [$this, 'getUserInfo'])
        ];
    }

    /**
     * @param array $userInfo
     */
    public function createSession($sessionId, $userInfo)
    {
        $this->redis->hmset('session_' . $sessionId, $userInfo);
    }

    /**
     * @param string $sessionId
     * @return boolean
     */
    public function hasSession($sessionId)
    {
        if ($this->redis->exists('session_' . $sessionId)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $sessionId
     * @return array
     */
    public function getUserInfo($sessionId)
    {
        $userInfo = $this->redis->hgetall('session_' . $sessionId);

        if (!$userInfo) {
            throw new \RuntimeException('Session not found');
        }

        return $userInfo;
    }

    /**
     * @return string
     */
    public function generateSessionId()
    {
        return sha1(openssl_random_pseudo_bytes(20));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'twig_extension';
    }
}
