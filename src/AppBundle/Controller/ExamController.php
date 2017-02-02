<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Answer;
use AppBundle\Entity\Student;

class ExamController extends Controller
{
    /**
     * @Route("/exam/answer")
     */
    public function answerAction(Request $request)
    {
        $IDStudent=1;//TODO - Should come from SESSION
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT s,t
                                    FROM AppBundle:Student s
                                    JOIN s.testtest t
                                    WHERE s.idsubject=:id
                                    ORDER BY t.idtest");
        $query->setParameter('id', $IDStudent);
        $results = $query->getResult();

        if (!$results)
        {
            //Translate message
            //throw $this->createNotFoundException('You are done here');
            return $this->redirect('/answer/rate');
        }

        $student=$results[0];
        $test=$student->getTesttest();

        $query = $em->createQuery("SELECT tq,q
                                    FROM AppBundle:TestHasQuestion tq
                                    JOIN tq.questionquestion q
                                    WHERE tq.testtest=:id
                                    ORDER BY tq.usesstressors,tq.questionquestion");
        $query->setParameter('id', $test->getIdtest());
        $results = $query->getResult();

        if (!$results)
        {
            //Translate message
            //throw $this->createNotFoundException('You are done here');
            return $this->redirect('/answer/rate');
        }

        $currentQuestion=0;
        $totalQuestions=0;
        $currentTestHQ=null;
        foreach($results as $r)
        {
          if (!$r->getUsesstressors())
            $totalQuestions=$totalQuestions+1;

          // F**K DOCTRINE AND SYMFONY
          $em = $this->getDoctrine()->getManager();
          $connection = $em->getConnection();
          $statement = $connection->prepare("select 1 from answer where test_has_questiont_idtest_has_question=:id ");
          $statement->bindValue('id', $r->getIdtestHasQuestion());
          $statement->execute();

          if ($statement->rowCount())
          {
            if (!$r->getUsesstressors())
              $currentQuestion=$currentQuestion+1;
          }
          else
            if (!$currentTestHQ)
            {
              $currentTestHQ=$r;
              if (!$r->getUsesstressors())
                $currentQuestion=$currentQuestion+1;
            }
        }

        if (!$currentTestHQ)
        {
            //Translate message
            //throw $this->createNotFoundException('You are done here');
            return $this->redirect('/answer/rate');
        }

        $question=$currentTestHQ->getQuestionquestion();

        // just setup a fresh $task object (remove the dummy data)
        $answer = new Answer();
        $answer->setText("");

        $form = $this->createFormBuilder($answer)
            ->add('text', TextareaType::class, array('label' => false))
            ->add('save', SubmitType::class, array('label' => 'Enviar'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $answer = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $answer->setAmbientVariables("TO-BE-DETERMINED"); //TODO
            $answer->setTime(new \DateTime());

            //TODO - WTF - This is a mandatory field, but when filled it crashes.
            $answer->setTestHasQuestionttestHasQuestion($currentTestHQ);


            //$em->persist($answer);
            // F**K DOCTRINE AND SYMFONY
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("INSERT INTO answer(text, ambient_variables,time,test_has_questiont_idtest_has_question,idstudent)
                                                VALUES (:text,:ambient,:time,:testHQ,:idstudent) ");
            $statement->bindValue('text', $answer->getText());
            $statement->bindValue('ambient', $answer->getAmbientVariables());
            $statement->bindValue('time', date("Y-m-d H:i:s"));
            $statement->bindValue('testHQ', $currentTestHQ->getIdtestHasQuestion());
            $statement->bindValue('idstudent', $IDStudent);
            $statement->execute();

            if (!$statement->rowCount())
            {
              //TODO - Translate message
              throw $this->createNotFoundException('Something went wrong');
            }

            //$em->flush();

            return $this->redirect('/exam/answer');
        }

        return $this->render('exam/answer.html.twig', array(
            'currentQuestion' => $currentQuestion,
            'totalQuestions' => $totalQuestions,
            'stressor' => $currentTestHQ->getUsesstressors()?1:0,
            'question_text' => $question->getText(),
            'form' => $form->createView(),
        ));
    }
}
