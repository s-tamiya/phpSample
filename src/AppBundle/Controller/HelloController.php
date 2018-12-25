<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HelloController extends Controller
{

 // 基本のコントローラ
  /**
  * @Route("/hello/{name}", name="hello")
  */
  public function indexAction($name = 'hello')
  {
    return new Response(
        '<html><body>Hello Controller '.$name.'</body></html>'
      );
  }

  // リダイレクト
  /**
  * @Route("/redirect", name="redirect")
  */
  public function redirectAction()
  {
    return $this->redirect('https://www.google.com/');
  }

  // 404エラーを発生させる
  /**
  * @Route("/error", name="error")
  */
  public function errorAction()
  {
    throw $this->createNotFoundException('Raise Error');
  }

  /**
  * @Route("/flash", name="flush")
  */
  public function flashAction(Request $request)
  {
    $this->addFlash('notice', 'Your changes were saved.');

    return $this->render('hello/index.html.twing');
  }
}
