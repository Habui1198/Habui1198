<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProductController extends Controller
{
    /**
     * @Route("/", name="view_product")
     */
    public function showProduct(Request $request)
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Products')->findAll();
        return $this->render('product/index.html.twig', array('products' => $products));
    }
    /**
     * @Route("/create", name="add_product")
     */
    public function addProduct(Request $request)
    {
        $product = new Products;
        $form = $this->createFormBuilder($product)
                        ->add('name',TextType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                        ->add('description',TextareaType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                        ->add('qty',NumberType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                         ->add('unit_price',NumberType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                        ->add('save',SubmitType::class,array('label'=>'Create Product','attr' => array('class' => 'btn btn-success btn-block','style'=>'margin-bottom:20px')))
                        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $name = $form['name']->getData();
            $description = $form['description']->getData();
            $qty = $form['qty']->getData();
            $unit_price = $form['unit_price']->getData();
            $now = new\Datetime('now');

            $product -> setName($name)
                     -> setDescription($description)
                     -> setQty($qty)
                     -> setUnitPrice($unit_price)
                     -> setCreateAt($now)
                     -> setUpdateAt($now);
                $newp = $this->getDoctrine()->getManager();
                $newp -> persist($product);
                $newp -> flush();
                $this -> addFlash(
                    'success',
                    'create product success'
                );
            return $this->redirectToRoute('view_product');

        }
        return $this->render('product/create.html.twig',array('form' => $form->createView()));
    }
    /**
     * @Route("/edit/{id}", name="edit_product")
     */
    public function editProduct($id,Request $request)
    {
        $product = $this->getDoctrine()->getRepository('AppBundle:Products')->find($id);
        $product ->setName($product->getName());
        $product ->setDescription($product->getDescription());
        $product ->setQty($product->getQty());
        $product ->setUnitPrice($product->getUnitPrice());
        $form = $this->createFormBuilder($product)
                        ->add('name',TextType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                        ->add('description',TextareaType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                        ->add('qty',NumberType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                         ->add('unit_price',NumberType::class,array('attr' => array('class' => 'form-control','style'=>'margin-bottom:20px')))
                        ->add('save',SubmitType::class,array('label'=>'Edit Product','attr' => array('class' => 'btn btn-success btn-block','style'=>'margin-bottom:20px')))
                        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $name = $form['name']->getData();
            $description = $form['description']->getData();
            $qty = $form['qty']->getData();
            $unit_price = $form['unit_price']->getData();
            $now = new\Datetime('now');

            $product -> setName($name)
                     -> setDescription($description)
                     -> setQty($qty)
                     -> setUnitPrice($unit_price)
                     -> setCreateAt($product->getCreateAt())
                     -> setUpdateAt($now);
                $newp = $this->getDoctrine()->getManager();
                $newp -> persist($product);
                $newp -> flush();
                $this -> addFlash(
                    'success',
                    'Update product success'
                );
            return $this->redirectToRoute('view_product');

        }
        return $this->render('product/edit.html.twig',array('form' => $form->createView()));
    }
     /**
     * @Route("/delete/{id}", name="delete_product")
     */
    public function deleteProduct($id)
    {
        $deletep = $this->getDoctrine()->getManager();
        $product = $deletep->getRepository('AppBundle:Products')->find($id); 

        $deletep->remove($product);
        $deletep->flush();
        $this -> addFlash(
            'success',
            'Delete product success'
        );
        return $this->redirectToRoute('view_product');
    }
}
