<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Answer;
use AppBundle\Entity\Student;

class AnswerController extends Controller
{
    /**
     * @Route("/answer/rate")
     */
    public function rateAction(Request $request)
    {
        $IDEvaluator=1;//TODO - Should come from SESSION
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT sh,s,a
                                    FROM AppBundle:Shouldevaluate sh
                                    JOIN AppBundle:Student s
                                    JOIN AppBundle:Answer a
                                    WHERE sh.idsubject=s.idsubject
                                    AND a.idstudent=s.idsubject
                                    and sh.idevaluator=:id");
        $query->setParameter('id', $IDEvaluator);
        $results = $query->getResult();

        if (!$results)
        {
            //TODO - Translate message
            throw $this->createNotFoundException('You are done here');
        }

        $currentQuestion=0;
        $totalQuestions=1;


        return $this->render('answer/rate.html.twig', array(
            'currentQuestion' => sizeof($results),//$currentQuestion,
            'totalQuestions' => sizeof($results[0]),//$totalQuestions,
            'question_text' => "LALA".$results[1]->getName()//,
            //'form' => $form->createView(),
        ));
    }
}
