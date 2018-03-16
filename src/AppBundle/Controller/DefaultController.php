<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    /**
     * @Route("/form", name="form")
     */
    public function newAction(Request $request)
    {
        // createFormBuilder is a shortcut to get the "form factory"
        // and then call "createBuilder()" on it

        $defaults = array(
            'dueDate' => new \DateTime('tomorrow'),
            'todaysDate' => new \DateTime('today'),
        );

        $gratitudeDefaults = array(
            'gratefulFor'=> "I am grateful for being alive today.",
        );

        $form = $this->createFormBuilder($defaults)
            ->add('task', new TextType)
            ->add('dueDate', new DateType)
            ->add('todaysDate', new DateType)
            ->getForm();

        $gratitudeForm = $this->createFormBuilder($gratitudeDefaults)
            ->add('gratefulFor', new TextType)
            ->getForm();

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
            'form2' => $gratitudeForm->createView()
        ));
    }

}
