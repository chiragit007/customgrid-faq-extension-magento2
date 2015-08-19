<?php
namespace chirag\Mygrid\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Chirag_Mygrid::question');
        $resultPage->addBreadcrumb(__('CMS'), __('CMS'));
        $resultPage->addBreadcrumb(__('Manage Questions'), __('FAQ'));
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ'));

        return $resultPage;
    }
}
