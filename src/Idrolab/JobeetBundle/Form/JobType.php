<?php

namespace Idrolab\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('company')
            ->add('category')
            ->add('logo', 'url')
            ->add('url', 'url')
            ->add('position')
            ->add('location')
            ->add('description')
            ->add('howToApply')
            ->add('token')
            ->add('isPublic')
            ->add('isActivated')
            ->add('email', 'email')
            ->add('expiresAt', 'date', array ('widget' => 'single_text',
                'format' => 'dd/MM/yyyy',))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Idrolab\JobeetBundle\Entity\Job'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'idrolab_jobeetbundle_job';
    }
}
