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
        $query->setParameter('id', 1);
        $results = $query->getResult();

        if (!$results)
        {
            //TODO - Translate message
            throw $this->createNotFoundException('You are done here');
        }

        $student=$results[0];
        $test=$student->getTesttest();

        $query = $em->createQuery("SELECT tq,q
                                    FROM AppBundle:TestHasQuestion tq
                                    JOIN tq.questionquestion q
                                    WHERE tq.testtest=:id");
        $query->setParameter('id', $test->getIdtest());
        $results = $query->getResult();

        if (!$results)
        {
            //TODO - Show message
            throw $this->createNotFoundException('No question found');
        }

        $testHQ=$results[0];
        $question=$testHQ->getQuestionquestion();

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
            $answer->setTestHasQuestionttestHasQuestion($testHQ);

            $em->persist($answer);
            $em->flush();

            return $this->render('default/index.html.twig', array('base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR));
        }

        return $this->render('exam/answer.html.twig', array(
            'question_text' => $question->getText(),
            'form' => $form->createView(),
        ));
    }
}
