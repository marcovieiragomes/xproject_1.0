<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 01/02/2017
 * Time: 13:15
 */

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use AppBundle\Entity\Student;
use AppBundle\Entity\Evaluator;
use AppBundle\Entity\Studentgroup;
use AppBundle\Entity\Test;
use AppBundle\Entity\Professor;
use AppBundle\Entity\Socialanalysis;
use AppBundle\Entity\Shouldevaluate;
use AppBundle\Entity\Dummytext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegistrationController extends Controller
{


    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
      // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            //4 set the isActive as 1
            $user->setIsactive(1);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            //$em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/multistudent", name="multiuser_registration")
     */
    public function multistudentAction(Request $request)
    {
      // 1) build the form
      $textD = new Dummytext();
      $form = $this->createFormBuilder($textD)
                    ->add('text', TextareaType::class, array('label' => false))
                    ->add('save', SubmitType::class, array('label' => 'Enviar'))
                    ->getForm();

      // 2) handle the submit (will only happen on POST)
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {

          $textD = $form->getData();

          $text=$textD->getText();

          //CREATE STUDENTGROUP
          $newGroup=new Studentgroup();
          $newGroup->setDescription("GrupoDalila");
          $newGroup->setYear(2017);
          $em = $this->getDoctrine()->getManager();
          $em->persist($newGroup);
          //$em->flush();

          //CREATE PROFESSOR
          $newUser=new User();
          $newUser->setUsername("teacher2017");
          $password = $this->get('security.password_encoder')
              ->encodePassword($newUser, "teacher2017");
          $newUser->setPassword($password);
          $newUser->setIsactive(1);
          $em = $this->getDoctrine()->getManager();
          $em->persist($newUser);
          //$em->flush();
          $newEvaluator=new Evaluator();
          $newEvaluator->setName("Photoshop-Dalila");
          $em = $this->getDoctrine()->getManager();
          $em->persist($newEvaluator);
          //$em->flush();
          $newProfessor=new Professor();
          $newProfessor->setName("Photoshop-Dalila");
          $newProfessor->setEvaluatorevaluator($newEvaluator);
          $newProfessor->setIduser($newUser);
          $em = $this->getDoctrine()->getManager();
          $em->persist($newProfessor);
          //$em->flush();

          //CREATE TEST
          $newTest=new Test();
          $newTest->setDescription("Test photoshop - Dalila");
          $newTest->setLocale("pt");
          $newTest->setDate(new \DateTime());
          $newTest->setProfessorprofessor($newProfessor);
          $em = $this->getDoctrine()->getManager();
          $em->persist($newTest);
          //$em->flush();

          $lines=explode("\n",$text);
          $students=array();
          foreach ($lines as $l)
          {
            $l=str_ireplace("\"","",$l);
            $fields=explode(",",$l);

            //CREATE USER
            $newUser=new User();
            $newUser->setUsername($fields[0]);

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($newUser, $fields[1]);
            $newUser->setPassword($password);

            //4 set the isActive as 1
            $newUser->setIsactive(1);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            //$em->flush();

            //CREATE EVALUATOR
            $newEvaluator=new Evaluator();
            $newEvaluator->setName($fields[4]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($newEvaluator);
            //$em->flush();

            //CREATE STUDENT
            $newStudent=new Student();
            $newStudent->setName($fields[4]);
            $newStudent->setAge($fields[5]);
            $newStudent->setGender($fields[2]);
            $newStudent->setCode($fields[3]);
            $newStudent->setEvaluatorevaluator($newEvaluator);
            $newStudent->setGroupgroup($newGroup);
            $newStudent->setTesttest($newTest);
            $newStudent->setIduser($newUser);
            $em = $this->getDoctrine()->getManager();
            $em->persist($newStudent);
            //$em->flush();

            $students[]=$newStudent;
          }

          $NUM_ANALYSIS=10;
          $NUM_EVALUATIONS=7;
          $totalStudents=sizeof($students);
          if ($totalStudents>$NUM_EVALUATIONS)
            for ($i=0; $i<$totalStudents; $i++)
              for ($j=0; $j<$NUM_ANALYSIS; $j++)
              {
                $stFrom=$students[$i];
                $stTo=$students[($i+$totalStudents-$j-1)%$totalStudents];

                //Add socialanalysis
                $newSA=new Socialanalysis();
                $newSA->setStudentsubject($stFrom);
                $newSA->setStudentsubject1($stTo);
                $em = $this->getDoctrine()->getManager();
                $em->persist($newSA);
                //$em->flush();

                if ($j<$NUM_EVALUATIONS)
                {
                  //Add shouldevaluate
                  $newSE=new Shouldevaluate();
                  $newSE->setIdevaluator($stFrom->getEvaluatorevaluator());
                  $newSE->setIdsubject($stTo);
                  $em = $this->getDoctrine()->getManager();
                  $em->persist($newSE);
                  //$em->flush();
                }
              }
          $em->flush();
          return $this->render('thankyou.html.twig', array());
      }



      return $this->render(
          'registration/multistudent.html.twig',
          array('form' => $form->createView())
      );
    }
}
