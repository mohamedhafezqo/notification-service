<?php

namespace App\Controller\API;

use App\Contract\QueueProducerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;

/**
 * Class PaymentController
 * @Rest\Route("/api/notification")
 * @package App\Controller\API
 */
class NotificationController
{
    /**
     * @param Request $request
     * @param QueueProducerInterface $producer
     *
     * @Rest\Post("/send", options={"i18n" = false, "expose"=true}, name="send_notification")
     * @SWG\Response(
     *     response=200,
     *     description="Produce a notification in queue",
     * )
     *
     * @return Response
     */
    public function send(Request $request, QueueProducerInterface $producer)
    {
        $message = json_decode($request->getContent(), true);
        $producer->publish(json_encode($message));

        return new Response('true', Response::HTTP_CREATED);
    }
}
