<?php
namespace Chirag\Mygrid\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $questionIds = $this->getRequest()->getParam('question');
        if (!is_array($questionIds) || empty($questionIds)) {
            $this->messageManager->addError(__('Please select question(s).'));
        } else {
            try {
                foreach ($questionIds as $postId) {
                    $post = $this->_objectManager->get('Chirag\Mygrid\Model\Question')->load($postId);
                    $post->delete();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been deleted.', count($questionIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('mygrid/*/index');
    }
}
