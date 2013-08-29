<?php
namespace Cerad\Bundle\Test01Bundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
//  Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Cerad\Bundle\Test01Bundle\Product\Product;

/* =============================================================
 * Read in an accounts.yml file and load the accounts tables
 * Try to minimize processing as much as possible
 */
class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName       ('cerad:test01:test')
            ->setDescription('Test Command');
          //->addArgument   ('fileName', InputArgument::REQUIRED, 'File to load')
          //->addArgument   ('arg1',     InputArgument::OPTIONAL, 'arg1(optional)')
       ;
    }
    protected function getService($id)     { return $this->getContainer()->get($id); }
    protected function getParameter($name) { return $this->getContainer()->getParameter($name); }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $em = $this->getService('doctrine.orm.test01_entity_manager');
        
        $product = new Product('ProductName');
        $em->persist($product);
        $em->flush();
        $productId = $product->getId();
        $em->clear();
        
        echo sprintf("Added product %d\n",$productId);
        
        $repo = $em->getRepository("Product:Product");
        $productx = $repo->find($productId);
        
        echo sprintf("Found product %d %s\n",$productx->getId(),$productx->getName());
        
    }        
}
?>
