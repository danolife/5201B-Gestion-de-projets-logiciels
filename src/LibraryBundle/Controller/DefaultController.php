<?php

namespace LibraryBundle\Controller;

use LibraryBundle\Entity\Cart;
use LibraryBundle\Entity\Category;
use LibraryBundle\Entity\Author;
use LibraryBundle\Entity\Book;
use LibraryBundle\Entity\Loan;
use LibraryBundle\Form\AuthorType;
use LibraryBundle\Form\BookType;
use LibraryBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
	public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$repo = $em->getRepository("LibraryBundle:Book");
    	$books = $repo->findAll();

        return $this->render('LibraryBundle:Default:index.html.twig', array('books' => $books));
    }

    public function newsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("LibraryBundle:Book");
        $books = $repo->findByIsNew(1);

        return $this->render('LibraryBundle:Default:nouveautes.html.twig', array('books' => $books));
    }

    public function adminAction()
    {
        return $this->render('LibraryBundle:Default:admin.html.twig');
    }

}
