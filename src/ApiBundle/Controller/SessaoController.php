<?php

namespace ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class SessaoController extends Controller
{
    /**
     * @Route("/api/sessao")
     * @Method("GET")
	 * @ApiDoc(
     *  resource=true,
     *  description="Retorna o status da sessao",
     *  filters={
     *  }
     * )
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        var_dump(file_get_contents('php://memory'));

        return new JsonResponse(['status' => $session->get('session_status', false)]);
    }

    /**
     * @Route("/api/sessao/logout")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Encerra a sessão",
     *  filters={
     *  }
     * )
     */
    public function logoutAction(Request $request)
    {
        $request->getSession()->invalidate();

        return new JsonResponse(['status' => true, 'message' => 'Logon efetuado com sucesso.']);
    }

    /**
     * @Route("/api/sessao/login/{email}/{senha}")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Efetua login de usuário",
     *  requirements={
     *    {"name"="email", "requirement"="true", "dataType"="string"},
     *    {"name"="senha", "requirement"="true", "dataType"="string"},
     *  }
     * )
     */
    public function loginAction(Request $request, $email, $senha)
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('SiteBundle:Usuario')->findBy(['email' => $email, 'senha' => md5($senha)]);

        if(count($usuarios) == 1){
            $request->getSession()->set("session_status", true);
            $request->getSession()->set("usuario", $usuarios[0]);

            return new JsonResponse(['status' => true, 'message' => 'Login efetuado com sucesso.']);
        }
        
        return new JsonResponse(['status' => false, 'message' => 'Login ou senha incorretos']);
    }
}