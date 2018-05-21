<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

//EntiteitType vervangen door b.v. KlantType
class ArtikelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
            ->add('naam', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('omschrijving', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('technischespecificatie', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('inkoopprijs', MoneyType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('minimaleVoorraad', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('aantalVoorraad', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('bestelserie', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('alternatiefArtikel', EntityType::class, array(
                'class' => "AppBundle:Artikel", 'choice_label' => 'naam'))
        ;
        $builder
            ->add('magazijnlocatie', EntityType::class, array(
                'class' => "AppBundle:magazijn", 'choice_label' => 'locatienummer'))
        ;

    }

        public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Artikel', //Entiteit vervangen door b.v. Klant
        ));
    }
}

?>