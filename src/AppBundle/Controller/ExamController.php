<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Answer;

class ExamController extends Controller
{
    /**
     * @Route("/exam/answer")
     */
    public function answerAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $answer = new Answer();
        $answer->setText("");

        $form = $this->createFormBuilder($answer)
            ->add('text', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Enviar'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!



            #$em = $this->getDoctrine()->getManager();
            #$em->persist($task);
            #$em->flush();

            return $this->render('default/index.html.twig', array('base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR));
        }

        return $this->render('exam/answer.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
