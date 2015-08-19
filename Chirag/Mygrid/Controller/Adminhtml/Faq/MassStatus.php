<?php
namespace Chirag\Mygrid\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class MassStatus extends \Magento\Backend\App\Action
{
    /**
     * Update blog post(s) status action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $questionIds = $this->getRequest()->getParam('question');
        if (!is_array($questionIds) || empty($questionIds)) {
            $this->messageManager->addError(__('Please select question(s).'));
        } else {
            try {
                $status = (int) $this->getRequest()->getParam('status');
                foreach ($questionIds as $postId) {
                    $post = $this->_objectManager->get('Chirag\Mygrid\Model\Question')->load($postId);
                    $post->setIsActive($status)->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been updated.', count($questionIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('mygrid/*/index');
    }

}
