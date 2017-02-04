<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Answer;
use AppBundle\Entity\Student;
use AppBundle\Entity\Multicriterion;

class AnswerController extends Controller
{
    /**
     * @Route("/answer/rate", name="rate")
     */
    public function rateAction(Request $request)
    {
        $IDEvaluator=70;//TODO - Should come from SESSION
        $em = $this->getDoctrine()->getManager();

        /* WON'T WORK
        $query = $em->createQuery("SELECT sh,s,a
                                    FROM AppBundle:Shouldevaluate sh
                                    JOIN sh.idsubject s
                                    JOIN AppBundle:Answer a
                                    WHERE a.idstudent=s.idsubject
                                    and sh.idevaluator=:id");
        $query->setParameter('id', $IDEvaluator);
        $results = $query->getResult();

        if (!$results)
        {
            //TODO - Translate message
            throw $this->createNotFoundException('You are done here');
        }*/

        // F**K DOCTRINE AND SYMFONY
        $connection = $em->getConnection();
        $statement = $connection->prepare("select sh.idshouldevaluate,a.idanswer, e.idevaluation
                                            from shouldevaluate sh
                                            inner join answer a
                                              on sh.idsubject=a.idstudent
                                            left join evaluation e
                                              on sh.idevaluator=e.evaluator_idevaluator
                                              and a.idanswer=e.answer_idanswer
                                            where sh.idevaluator=:id");
        $statement->bindValue('id', $IDEvaluator);
        $statement->execute();
        $result=$statement->fetchAll();

        if (!$result)
          return $this->render('thankyou.html.twig', array());

        $IDCurrentAnswer=null;
        $currentQuestion=1;
        $totalQuestions=0;
        foreach ($result as $r)
        {
          $totalQuestions=$totalQuestions+1;
          if ($r['idevaluation'])
            $currentQuestion=$currentQuestion+1;
          else
            if (!$IDCurrentAnswer)
              $IDCurrentAnswer=$r['idanswer'];
        }

        if (!$IDCurrentAnswer)
          return $this->render('thankyou.html.twig', array());

        /* Are you sh****ng me??
                $answer = $this->getDoctrine()
                  ->getRepository('AppBundle:Answer')
                  ->find($IDCurrentAnswer);
        */

        // F**K DOCTRINE AND SYMFONY
        $connection = $em->getConnection();
        $statement = $connection->prepare("select a.text as response,q.text as question,c.description,c.issubjective,s.name
                                            from answer a
                                            inner join test_has_question th
                                            	on a.test_has_questiont_idtest_has_question=th.idtest_has_question
                                            inner join question q
                                            	on th.question_idquestion=q.idquestion
                                            inner join criterion c
                                            	on q.idquestion=c.question_idquestion
                                            inner join student s
  	                                          on a.idstudent=s.idsubject
                                            where a.idanswer=:id");
        $statement->bindValue('id', $IDCurrentAnswer);
        $statement->execute();
        $result=$statement->fetchAll();


        if (!$result) {
            throw $this->createNotFoundException(
                'Could not find answer '.$IDCurrentAnswer
            );
        }

        $multicriterion=new Multicriterion();
        $form = $this->createFormBuilder($multicriterion);

        $questionText="";
        $answerText="";
        $studentName="";
        $i=1;
        $binaryChoices=array("Sim" => 1,"Não" => 0);
        $multipleChoices=array("0 (nada)" => 0,"1" => 1, "2" => 2, "3" => 3, "4 (muito)" => 4);
        foreach ($result as $r)
        {
          $questionText=$r["question"];
          $answerText=$r["response"];
          $studentName=$r["name"];
          $choices=$binaryChoices;
          $explanation="";
          if ($r["issubjective"])
          {
            $choices=$multipleChoices;
            $explanation=" (pick on a scale)";
          }
          $form=$form->add('evaluation'.$i,
                            ChoiceType::class,
                            array('label' => $r["description"].$explanation,
                                  "choices" => $choices,
                                  'expanded' => true,
                                  'multiple' => false));
          $i=$i+1;
        }

        $form=$form
            ->add('ambient', HiddenType::class, array('data' => 'TO-BE-FILLED'))
            ->add('save', SubmitType::class, array('label' => 'Enviar'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $multicriterion = $form->getData();

          // F**K DOCTRINE AND SYMFONY
          $em = $this->getDoctrine()->getManager();
          $connection = $em->getConnection();
          $statement = $connection->prepare("INSERT INTO evaluation(evaluation, evaluator_idevaluator,answer_idanswer,criterion_accomplished,ambient_variables,time)
                                              VALUES (:evaluation,:idevaluator,:idanswer,:criteria,:ambient,:time) ");
          $statement->bindValue('evaluation', 1);
          $statement->bindValue('idevaluator', $IDEvaluator);
          $statement->bindValue('idanswer', $IDCurrentAnswer);
          $statement->bindValue('ambient', $multicriterion->getAmbient());
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
        }

        return $this->render('answer/rate.html.twig', array(
            'currentQuestion' => $currentQuestion,//$currentQuestion,
            'totalQuestions' => $totalQuestions,//$totalQuestions,
            'answer_text' => $answerText,
            'question_text' => $questionText,
            'person' => $studentName,
            'form' => $form->createView(),
        ));
    }
}
