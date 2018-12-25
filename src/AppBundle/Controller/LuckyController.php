<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController
{
  /**
  * @Route("/lucky/number/{count}")
  */
  public function numberAction()
  {
    $number = rand(0, 100);

    return new Response(
        '<html><body>Lucky Number: '.$number.'</body></html>'
      );
  }

  /**
  * @Route("/api/lucky/number")
  */
  public function apiNumberAction()
  {
    $data = array(
      'lucky_number' => rand(0, 100),
    );

  return new Response(
      json_encode($data),
      200,
      array('Context-Type' => 'application/json')
    );
  }

  /**
  * @Route("/lucky/number/{count}")
  */
  public function numberCountAction($count)
  {
      $numbers = array();
      for ($i = 0; $i < $count; $i++) {
        $numbers[$i] = rend(0, 100);
      }
      $numbersList = implode(', ', $numbers);

      /*return new Response(
        '<html><body>Lucky Number: '.$numbersList.'</body></html>'
      );*/

      $html = $this->render(
          'lucky/number.html.twing',
          ['luckyNumberList' => $numbersList]
        );

      return new Response($html);
  }
}
