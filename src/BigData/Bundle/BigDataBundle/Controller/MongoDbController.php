<?php


namespace BigData\Bundle\BigDataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \MongoClient as MongoClient;
/**
 * @Route("/mongo")
 */
class MongoDbController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        echo "<pre>";
        $connection = new MongoClient("localhost");
        $db = $connection->bigdata;
        $collection = $db->serverinfo;

        $array = $_SERVER;

        $collection->insert($array);
        echo "ID: ", $array['_id'], "<br>";

        $cursor = $collection->find();

        foreach ($cursor as $obj) {
            print_r($obj);
        }

        return $this->render('BigDataBundleBigDataBundle:Default:index.html.twig');
    }
}