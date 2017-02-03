<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Socialanalysis;
use AppBundle\Entity\Student;

class SocialanalysisController extends Controller
{
    /**
     * @Route("/social/analysis")
     */
    public function analysisAction(Request $request)
    {
        $IDStudent=1;//TODO - Should come from SESSION
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT sa,s
                                    FROM AppBundle:Socialanalysis sa
                                    JOIN sa.studentsubject1 s
                                    WHERE sa.studentsubject=:id");
        $query->setParameter('id', $IDStudent);
        $results = $query->getResult();

        if (!$results)
        {
            //TODO - Translate message
            throw $this->createNotFoundException('You are done here');
        }

        $currentQuestion=0;
        $totalQuestions=0;

        $studentToRate=null;
        foreach($results as $r)
          $studentToRate=$r;

        $socAn=new Socialanalysis();

        $binaryChoices=array("Sim" => 1,"Não" => 0);
        $multipleChoices=array("0 (nada)" => 0,"1" => 1, "2" => 2, "3" => 3, "4 (muito)" => 4);

        $form = $this->createFormBuilder($socAn)
                ->add('hidrance', ChoiceType::class, array('label' => 'Hidrance', "choices" => $multipleChoices))
                ->add('friendship1', ChoiceType::class, array('label' => 'Friendship1', "choices" => $multipleChoices))
                ->add('friendship2', ChoiceType::class, array('label' => 'Friendship2', "choices" => $multipleChoices))
                ->add('advice', ChoiceType::class, array('label' => 'Advice', "choices" => $multipleChoices))
                ->add('confidence', ChoiceType::class, array('label' => 'Confidence', "choices" => $multipleChoices))
                ->add('save', SubmitType::class, array('label' => 'Enviar'))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $socAnRead = $form->getData();

          $socAn = $em->getRepository('AppBundle:Socialanalysis')->find($studentToRate->getIdsocialanalysis());

          if (!$socAn) {
              throw $this->createNotFoundException(
                  'No social analysis found for id '.$studentToRate->getIdsocialanalysis()
              );
          }

          $socAn->setHidrance($socAnRead->getHidrance());
          $socAn->setFriendship1($socAnRead->getFriendship1());
          $socAn->setFriendship2($socAnRead->getFriendship2());
          $socAn->setAdvice($socAnRead->getAdvice());
          $socAn->setConfidence($socAnRead->getConfidence());
          $em->flush();


          $em->flush();

          /*/ F**K DOCTRINE AND SYMFONY
          $em = $this->getDoctrine()->getManager();
          $connection = $em->getConnection();
          $statement = $connection->prepare("INSERT INTO evaluation(evaluation, evaluator_idevaluator,answer_idanswer,criterion_accomplished,ambient_variables,time)
                                              VALUES (:evaluation,:idevaluator,:idanswer,:criteria,:ambient,:time) ");
          $statement->bindValue('evaluation', 1);
          $statement->bindValue('idevaluator', $IDEvaluator);
          $statement->bindValue('idanswer', $IDCurrentAnswer);
          $statement->bindValue('ambient', "TO-BE-DETERMINED");
          $statement->bindValue('time', date("Y-m-d H:i:s"));
          $statement->bindValue('criteria', $multicriterion->getEvaluation1()."".$multicriterion->getEvaluation2()."".$multicriterion->getEvaluation3());
          $statement->execute();

          if (!$statement->rowCount())
          {
            //TODO - Translate message
            throw $this->createNotFoundException('Something went wrong');
          }
          else
            return $this->redirect('/answer/rate');
          */
        }

        return $this->render('answer/rate.html.twig', array(
            'currentQuestion' => $currentQuestion,//$currentQuestion,
            'totalQuestions' => $totalQuestions,//$totalQuestions,
            'answer_text' => $studentToRate->getStudentsubject1()->getName(),
            'question_text' => 'AA',
            'form' => $form->createView(),
        ));
    }
}
