<?php

namespace AppBundle\Controller\View;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Facebook\Facebook;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function indexAction(Request $request)
    {
        if ($this->validateCookie($request)) {
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/callback", name="callback")
     */
    public function callbackAction(Request $request)
    {
        $fb = new Facebook([
            'app_id' => $this->container->getParameter('fb_app_id'),
            'app_secret' => $this->container->getParameter('fb_app_secret'),
            'default_graph_version' => 'v2.5'
        ]);

        $accessToken = $fb->getJavaScriptHelper()->getAccessToken();
        if (!$accessToken) {
            throw new \RuntimeException('No cookie set or no OAuth data could be obtained from cookie');
        }

        $userInfo = $fb->get('/me?fields=id,name,email', $accessToken->getValue())->getDecodedBody();
        if (!isset($userInfo['id'])) {
            throw new \RuntimeException('Bad credentials');
        }

        $this->storeUserInfo($userInfo);

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        $response = new Response();
        $response->headers->clearCookie('session_id');
        $response->sendHeaders();

        return $this->redirectToRoute('homepage');
    }

    /**
     * @param array $userInfo
     */
    private function storeUserInfo($userInfo)
    {
        $extension = $this->get('app.twig_extension');

        $sessionId = $extension->generateSessionId();
        $extension->createSession($sessionId, $userInfo);

        $response = new Response();
        $expired = time() + 86400 * 30;
        $response->headers->setCookie(new Cookie('session_id', $sessionId, $expired));
        $response->sendHeaders();
    }

    /**
     * @param Request $request
     * @return boolean
     */
    private function validateCookie($request)
    {
        $sessionId = $request->cookies->get('session_id');

        return $this->get('app.twig_extension')->hasSession($sessionId);
    }
}
