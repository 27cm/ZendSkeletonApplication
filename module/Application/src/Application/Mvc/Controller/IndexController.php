<?php

namespace Application\Mvc\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Examples\Di\Foo;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $di = $this->getServiceLocator()->get('di');
        $foo = $di->get(Foo::class);

        return new ViewModel();
    }
}
