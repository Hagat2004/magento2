<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Email\Controller\Adminhtml\Email\Template;

class Save extends \Magento\Email\Controller\Adminhtml\Email\Template
{
    /**
     * Save transactional email action
     *
     * @return void
     */
    public function execute()
    {
        $request = $this->getRequest();
        $id = $this->getRequest()->getParam('id');

        $template = $this->_initTemplate('id');
        if (!$template->getId() && $id) {
            $this->messageManager->addError(__('This email template no longer exists.'));
            $this->_redirect('adminhtml/*/');
            return;
        }

        try {
            $template->setTemplateSubject(
                $request->getParam('template_subject')
            )->setTemplateCode(
                $request->getParam('template_code')
            )->setTemplateText(
                $request->getParam('template_text')
            )->setTemplateStyles(
                $request->getParam('template_styles')
            )->setModifiedAt(
                $this->_objectManager->get('Magento\Framework\Stdlib\DateTime\DateTime')->gmtDate()
            )->setOrigTemplateCode(
                $request->getParam('orig_template_code')
            )->setOrigTemplateVariables(
                $request->getParam('orig_template_variables')
            );

            if (!$template->getId()) {
                $template->setTemplateType(\Magento\Email\Model\Template::TYPE_HTML);
            }

            if ($request->getParam('_change_type_flag')) {
                $template->setTemplateType(\Magento\Framework\App\TemplateTypesInterface::TYPE_TEXT);
                $template->setTemplateStyles('');
            }

            $template->save();
            $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
            $this->messageManager->addSuccess(__('The email template has been saved.'));
            $this->_redirect('adminhtml/*');
        } catch (\Exception $e) {
            $this->_objectManager->get(
                'Magento\Backend\Model\Session'
            )->setData(
                'email_template_form_data',
                $request->getParams()
            );
            $this->messageManager->addError($e->getMessage());
            $this->_forward('new');
        }
    }
}
