<?php

namespace Services;

use Models\Method;

class OrderService
{
    const REASON_CANCELED_USER = 2;

    const ROUTE_MELHOR_ENVIO_CANCEL = '/shipment/cancel';

    const ROUTE_MELHOR_ENVIO_CANCELLABLE = '/shipment/cancellable';

    const ROUTE_MELHOR_ENVIO_TRACKING = '/shipment/tracking';

    const ROUTE_MELHOR_ENVIO_CART = '/cart';

    const ROUTE_MELHOR_ENVIO_CHECKOUT = '/shipment/checkout';

    const ROUTE_MELHOR_ENVIO_CREATE_LABEL = '/shipment/generate';

    const ROUTE_MELHOR_ENVIO_PRINT_LABEL = '/shipment/print';

    const ROUTE_MELHOR_ENVIO_SEARCH = '/orders/search?q=';

    /**
     * Function to cancel order on api Melhor Envio.
     *
     * @param int $postId
     * @return array $response
     */
    public function cancel($postId)
    {
        $orderId = $this->getOrderIdByPostId($postId);

        if (is_null($orderId)) {
            return [
                'success' => false,
                'message' => 'Pedido não encontrado'
            ];
        }

        $body['order'] = [
            'id'          => $orderId,
            'reason_id'   => self::REASON_CANCELED_USER,
            'description' => 'Cancelado pelo usuário'
        ];

        (new OrderQuotationService())->removeDataQuotation($postId);

        return (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_CANCEL,
            'POST',
            json_encode($body),
            false
        );
    }

    /**
     * Function to get info about order in api Melhor Envio.
     *
     * @param int $orderId
     * @return array $response
     */
    public function info($postId)
    {
        $data = (new OrderQuotationService())->getData($postId);

        if (!$data) {
            return [
                'success' => false,
                'message' => 'Ordem não encontrada no Melhor Envio'
            ];
        }

        return (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_CART . '/' . $data['order_id'],
            'GET',
            [],
            false
        );
    }


    /**
     * Function to get details about order in api Melhor Envio.
     *
     * @param int $postId
     * @return array $response
     */
    public function detail($postId)
    {
        $data = (new OrderQuotationService())->getData($postId);

        if (empty($data['order_id'])) {
            return [
                'success' => false,
                'message' => 'Pedido não possui etiqueta do Melhor Envio'
            ];
        }

        $body = [
            'orders' => (array) $data['order_id']
        ];

        if (!$data) {
            return [
                'success' => false,
                'message' => 'Ordem não encontrada no Melhor Envio'
            ];
        }

        return (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_TRACKING,
            'POST',
            $body,
            true
        );
    }

    /**
     * Function to create a label on Melhor Envio.
     *
     * @param array $postsId
     * @return array $response
     */
    public function pay($postsId)
    {
        $wallet = 0;
        $orders = [];

        foreach ($postsId as $postId) {
            $orderId = $this->getOrderIdByPostId($postId);

            if (is_null($orderId)) {
                continue;
            }

            $orders[] = $orderId;
            $ticket = $this->infoOrderCart($orderId);
            $wallet = $wallet + $ticket->price;
        }

        if ($wallet == 0) {
            return [
                'success' => false,
                'message' => 'Sem pedidos para pagar'
            ];
        }

        $body = [
            'orders' => $orders,
            'wallet' => $wallet
        ];

        $result = (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_CHECKOUT,
            'POST',
            $body,
            true
        );

        if (array_key_exists('errors', $result)) {
            return $result;
        }

        return (new OrderQuotationService())->updateDataQuotation(
            end($postsId),
            end($result->purchase->orders)->id,
            end($result->purchase->orders)->protocol,
            $result->purchase->status,
            end($result->purchase->orders)->service_id,
            $result->purchase->id,
            end($result->purchase->orders)->self_tracking
        );
    }

    /**
     * Function to create a label on Melhor Envio.
     *
     * @param array $postId
     * @param $orderId
     * @return array $response
     */
    public function payByOrderId($postId, $orderId)
    {
        $wallet = 0;
        $orders = [];

        $orders[] = $orderId;
        $ticket = $this->infoOrderCart($orderId);
        $wallet = $wallet + $ticket->price;


        if ($wallet == 0) {
            return [
                'success' => false,
                'errors' => (array) 'Sem pedidos para pagar'
            ];
        }

        $body = [
            'orders' => $orders,
            'wallet' => $wallet
        ];

        $result = (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_CHECKOUT,
            'POST',
            $body,
            true
        );

        if (!empty($result->errors)) {
            return [
                'success' => false,
                'errors' => $result->errors
            ];
        }

        $response = (new OrderQuotationService())->updateDataQuotation(
            $postId,
            end($result->purchase->orders)->id,
            end($result->purchase->orders)->protocol,
            $result->purchase->status,
            end($result->purchase->orders)->service_id,
            $result->purchase->id,
            end($result->purchase->orders)->self_tracking
        );

        $response['result'] = $result;

        return $response;
    }
    /**
     * Function to create a label printble on melhor envio.
     *
     * @param int $postId
     * @return void
     */
    public function createLabel($postId)
    {
        $orderId = $this->getOrderIdByPostId($postId);

        $body = [
            'orders' => (array) $orderId,
            'mode' => 'public'
        ];

        $result = (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_CREATE_LABEL,
            'POST',
            $body,
            true
        );

        if (!empty($result->errors)) {
            return [
                'success' => false,
                'errors' => $result->errors
            ];
        }

        $data = (new OrderQuotationService())->getData($postId);

        $data = (new OrderQuotationService())->updateDataQuotation(
            $postId,
            $data['order_id'],
            $data['protocol'],
            'generated',
            $data['choose_method'],
            $data['purchase_id'],
            $data['tracking']
        );

        return $data;
    }

    public function printLabel($postId)
    {
        $orderId = $this->getOrderIdByPostId($postId);

        $body = [
            'orders' => (array) $orderId
        ];

        $result = (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_PRINT_LABEL,
            'POST',
            $body,
            true
        );

        if (!isset($result->url)) {
            return [
                'success' => false,
                'message' => 'Não foi possível imprimir a etiqueta'
            ];
        }

        $data = (new OrderQuotationService())->getData($postId);

        $data = (new OrderQuotationService())->updateDataQuotation(
            $postId,
            $data['order_id'],
            $data['protocol'],
            'released',
            $data['choose_method'],
            $data['purchase_id'],
            $data['tracking']
        );

        return $result;
    }

    /**
     * Function to get info about order in api Melhor Envio.
     *
     * @param int $order_id
     * @return array $response
     */
    public function infoOrderCart($orderId)
    {
        return (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_CART . '/' . $orderId,
            'GET',
            [],
            false
        );
    }

    /**
     * Function to get information in Melhor Envio.
     *
     * @param string $order_id
     * @return array $response
     */
    public function getInfoOrder($orderId)
    {
        return (new RequestService())->request(
            self::ROUTE_MELHOR_ENVIO_SEARCH . $orderId,
            'GET',
            [],
            false
        );
    }

    /**
     * Function to get order_id by post_id.
     *
     * @param int $postId
     * @return string $order_id
     */
    public function getOrderIdByPostId($postId)
    {
        $data = (new OrderQuotationService())->getData($postId);

        if (!isset($data['order_id'])) {
            return null;
        }

        return $data['order_id'];
    }

    /**
     * Function to merge status with stauts melhor envio.
     *
     * @param array $posts
     * @return array $response
     */
    public function mergeStatus($posts)
    {
        $response = [];

        foreach ($posts as $post) {
            $data = (new OrderQuotationService())->getData($post->ID);

            if (empty($data)) {
                $response[$post->ID] = [
                    'order_id' => null,
                    'status' => null,
                    'protocol' => null,
                    'tracking' => null,
                    'service_id' => null
                ];
                continue;
            }

            $dataOrder = $this->getInfoOrder($data['order_id']);

            $info = end($dataOrder);

            if (!is_object($info) && $info[0] == 'Not Found') {
                $response[$post->ID] = [
                    'order_id' => null,
                    'status' => null,
                    'protocol' => null,
                    'tracking' => null,
                    'service_id' => null
                ];
                continue;
            }

            $response[$post->ID] = [
                'order_id' => $data['order_id'],
                'status' => $info->status,
                'protocol' => $info->protocol,
                'tracking' => $info->tracking,
                'service_id' => (!empty($data['choose_method'])) ? $data['choose_method'] : null
            ];

            if (!is_null($info->tracking)) {
                (new TrackingService())->addTrackingOrder(
                    $post->ID,
                    $info->tracking
                );
            }
        }

        return $response;
    }

    /**
     * Multi-label purchase function in a single click
     *
     * @param array $posts
     * @return array
     */
    public function buyOnClick($posts)
    {
        $orders = [];

        $errors = [];

        foreach ($posts as $postId) {
            $data = (new OrderQuotationService())->getData($postId);

            if (empty($data) || is_null($data['order_id'])) {
                $products = (new OrdersProductsService())->getProductsOrder($postId);

                $to = (new BuyerService())->getDataBuyerByOrderId($postId);

                $chooseMethod = (new Method())->getMethodShipmentSelected($postId);

                $data = (new cartService())->add($postId, $products, $to, $chooseMethod);

                if (isset($data['message'])) {
                    $errors[$postId][] = $data['message'];
                }
            }

            if ($data['status'] == 'pending') {
                $data = $this->payByOrderId($postId, $data['order_id']);

                if (isset($data['message'])) {
                    $errors[$postId][] = $data['message'];
                }
            }

            if ($data['status'] == 'paid') {
                $data = $this->createLabel($postId);

                if (isset($data['message'])) {
                    $errors[$postId][] = $data['message'];
                }

                if (isset($data['message'])) {
                    $errors[$postId][] = $data['message'];
                }

                $orders[$postId] = $data['order_id'];
            }

            if ($data['status'] == 'generated' || $data['status'] == 'released') {
                if (isset($data['message'])) {
                    $errors[$postId][] = $data['message'];
                }

                $orders[$postId] = $data['order_id'];
            }
        }

        if (!empty($orders)) {
            $body = [
                'orders' => $orders
            ];

            $result = (new RequestService())->request(
                self::ROUTE_MELHOR_ENVIO_PRINT_LABEL,
                'POST',
                $body,
                true
            );
        }

        return [
            'url' => $result->url,
            'errors' => $errors
        ];
    }
}
