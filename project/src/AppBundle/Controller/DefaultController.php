<?php


namespace AppBundle\Controller;
$ola = "";

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    public $ip = '';
    public $instanceId = 0;

    /**
     * @Route("/ip", name="ip")
     */
    public function getIp(Request $request)
    {
        $ip = $_REQUEST["ip"];
        $instanceId = $_REQUEST["instanceId"];
        echo "toto";
        echo $ip;
        echo $instanceId;
        return $this->render('ipInfo.html.twig');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //$ip = $_REQUEST["id"];
        static $instanceId = 0;
        //return new Response ("Welcome to the php White application");

        return $this->render('testSendMsg.html.twig');
    }


    /**
     * @Route("/api/handshake")
     */
    public function handshake()
    {
        $data = array(
            'sender' => 'app' ,
            'instanceID' => $this->instanceId,
            'data' => array(
                'address' => $this->ip,
                'agenda' => array(
                    'time' => '09:00',
                    'repeat' => 4,
                    'callback' => 5 // TODO : URL needs to be put here
                ),
            )
        );


        $post = "data=".json_encode($data);
        // return new Response($post);

        $url = 'http://192.168.0.151/api/handshake';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        $err     = curl_errno( $ch );
        var_dump($result);
        $errmsg  = curl_error( $ch );
        echo $errmsg;
        return new Response("toto");
    }

    /**
     * @Route("/api/product")
     */
    public function getProductCategory($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productId
            );
        }
        else {
            $category = $product->getCategory();
            return new Response('Hello! Le produit a été fetch. Catégorie du produit : '.$category);
        }
    }

    /**
     * @Route("/api/sendMsg")
     */
    public function sendMessage()
    {
        //il faut remplacer to par le nom de la fonction et referentiel par le nom de l'application sender choisie
        $url = 'http://192.168.0.151/api/service?fct=' . 'entrepot' . '&target=' . 'referentiel' . '&targetInstance=' . $this->instanceId;
        $var = curl_init($url);

        curl_setopt($var, CURLOPT_URL, $url);
        $data = array(
            'sender' => 'referentiel' ,
            'instanceID' => $this->instanceId,
            'data' => array(
                'address' => $this->ip,
                'product' => array(
                    'id_product' => '12',
                    'sale_price' => '124',
                    'isModified' => 'false',
                    'isDeleted' => 'false',
                    'isAssortment' => 'true',
                )
            )
        );

        $request = "data=".json_encode($data);

        curl_setopt($var, CURLOPT_HEADER, 0);
        curl_setopt($var, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($var, CURLOPT_POSTFIELDS, $request);
        //curl_setopt($var, CURLOPT_RETURNTRANSFER, FALSE);
        $result = curl_exec($var);
        $err = curl_error($var);
        curl_close($var);
        echo 'Send message';
        return new Response((string)$result);
    }
}