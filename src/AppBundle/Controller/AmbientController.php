<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Answer;
use AppBundle\Entity\Student;
use AppBundle\Entity\Multicriterion;

class AmbientController extends Controller
{
    /**
     * @Route("/ambient/storeanswer")
     */
    public function storeanswerAction(Request $request)
    {
        $IDStudent=1;//TODO - Should come from SESSION

        print_r($_POST);

        return $this->render('ambient/simple-response.html.twig', array(
            'success' => 1
        ));
    }

    /**
     * @Route("/ambient/storeevaluator")
     */
    public function storeevaluatorAction(Request $request)
    {
        $IDStudent=1;//TODO - Should come from SESSION


        return $this->render('ambient/simple-response.html.twig', array(
            'success' => 1
        ));
    }
}
