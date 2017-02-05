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
     * @Route("/social/analysis", name="socialanalysis")
     */
    public function analysisAction(Request $request)
    {
        $usr=$this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        $student = $this->getDoctrine()
                  ->getRepository('AppBundle:Student')
                  ->findOneByIduser($usr->getIduser());

        $IDStudent=$student->getIdsubject();
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT sa,s
                                    FROM AppBundle:Socialanalysis sa
                                    JOIN sa.studentsubject1 s
                                    WHERE sa.studentsubject=:id");
        $query->setParameter('id', $IDStudent);
        $results = $query->getResult();

        if (!$results)
          return $this->render('thankyou.html.twig', array());

        $currentQuestion=0;
        $totalQuestions=0;

        $sABeingFilled=null;
        foreach($results as $r)
        {
          $totalQuestions=$totalQuestions+1;
          if ($r->getHidrance()===null)
          {
            if (!$sABeingFilled)
            {
              $currentQuestion=$currentQuestion+1;
              $sABeingFilled=$r;
            }
          }
          else
            $currentQuestion=$currentQuestion+1;
        }
        if (!$sABeingFilled)
          return $this->render('thankyou.html.twig', array());

        $socAn=new Socialanalysis();

        $binaryChoices=array("Sim" => 1,"Não" => 0);
        $multipleChoices=array("0 (não conheço/nada)" => 0,"1" => 1, "2" => 2, "3" => 3, "4 (muito)" => 4);
        $multipleChoicesF=array("0 (não conheço/nunca)" => 0,"1" => 1, "2" => 2, "3" => 3, "4 (sempre)" => 4);

        $form = $this->createFormBuilder($socAn)
                ->add('hidrance', ChoiceType::class, array('label' => 'Esta pessoa dificulta o desenvolvimento do teu trabalho? ('.$sABeingFilled->getStudentsubject1()->getName().')',
                                                            "choices" => $multipleChoices,
                                                            'expanded' => true,
                                                            'multiple' => false))
                ->add('friendship1', ChoiceType::class, array('label' => 'Consideras esta pessoa como tua amiga? - intensidade ('.$sABeingFilled->getStudentsubject1()->getName().')',
                                                            "choices" => $multipleChoices,
                                                            'expanded' => true,
                                                            'multiple' => false))
                ->add('friendship2', ChoiceType::class, array('label' => 'Consideras esta pessoa como tua amiga? - freqüência ('.$sABeingFilled->getStudentsubject1()->getName().')',
                                                            "choices" => $multipleChoicesF,
                                                            'expanded' => true,
                                                            'multiple' => false))
                ->add('advice', ChoiceType::class, array('label' => 'Recorres a esta pessoa para pedir conselhos ou ajuda? ('.$sABeingFilled->getStudentsubject1()->getName().')',
                                                            "choices" => $multipleChoices,
                                                            'expanded' => true,
                                                            'multiple' => false))
                ->add('confidence', ChoiceType::class, array('label' => 'Falas com esta pessoa sobre temas confidenciais? ('.$sABeingFilled->getStudentsubject1()->getName().')',
                                                            "choices" => $multipleChoices,
                                                            'expanded' => true,
                                                            'multiple' => false))
                ->add('save', SubmitType::class, array('label' => 'Enviar'))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $socAnRead = $form->getData();

          $socAn = $em->getRepository('AppBundle:Socialanalysis')->find($sABeingFilled->getIdsocialanalysis());

          if (!$socAn) {
              throw $this->createNotFoundException(
                  'No social analysis found for id '.$sABeingFilled->getIdsocialanalysis()
              );
          }

          $socAn->setHidrance($socAnRead->getHidrance());
          $socAn->setFriendship1($socAnRead->getFriendship1());
          $socAn->setFriendship2($socAnRead->getFriendship2());
          $socAn->setAdvice($socAnRead->getAdvice());
          $socAn->setConfidence($socAnRead->getConfidence());
          $em->flush();

          return $this->redirect('/social/analysis');
        }

        return $this->render('social/analysis.html.twig', array(
            'currentQuestion' => $currentQuestion,//$currentQuestion,
            'totalQuestions' => $totalQuestions,//$totalQuestions,
            'person' => $sABeingFilled->getStudentsubject1()->getName(),
            'form' => $form->createView(),
        ));
    }
}
