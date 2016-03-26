<?php


namespace BigData\Bundle\BigDataBundle\Controller;

use BigData\Bundle\BigDataBundle\Model\Mongo\Entity\Patient;
use BigData\Bundle\BigDataBundle\Model\Mongo\Manager\PatientManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Exception\ValidatorException;

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
        /*
         * @var BigData\Bundle\BigDataBundle\Model\Mongo\Manager\PatientManager $patientManager
         * */
        $patientManager = new PatientManager();

        /*
         * @var \MongoCursor $result
         * */
        $result = $patientManager->find([]);

        return $this->render('BigDataBundleBigDataBundle:Default:index.html.twig', [
            'cursor' => $result
        ]);
    }

    /**
     * @Route("/add")
     */
    public function addAction(Request $request)
    {
        try {
            if (!$request->isMethod('get')) {
                throw new Exception("Expected POST request method");
            }

            $properties = $_REQUEST;;

            print_r($properties);

            if (!count($properties)) {
                throw new ValidatorException("Error - empty data");
            }

            /*
             * @var BigData\Bundle\BigDataBundle\Model\Mongo\Manager\PatientManager $patientManager
             * */
            $patientManager = new PatientManager();
            /*
             * @var BigData\Bundle\BigDataBundle\Model\Mongo\Entity\Patient $patient
             * */
            $patient = new Patient();

            $patient->setData($properties);

            $patientManager->preset($patient)->insert();

        } catch (Exception $e) {
            throw $e;
        }

        return JsonResponse::create($patient->getData());
    }
}