<?php
class Vivacity_Slide_Block_Adminhtml_Slide_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('slide_form', array('legend'=>Mage::helper('slide')->__('Item information')));
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('slide')->__('Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
	$fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('slide')->__('Upload File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
	$fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('slide')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('slide')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('slide')->__('Disabled'),
              ),
          ),
      ));
	$fieldset->addField('weblink', 'text', array(
          'label'     => Mage::helper('slide')->__('Image Url Name'),
          'required'  => false,
          'name'      => 'weblink',
      ));
	$fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('slide')->__('Image Content'),
          'title'     => Mage::helper('slide')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => false,
      ));
	if ( Mage::getSingleton('adminhtml/session')->getSlideData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSlideData());
          Mage::getSingleton('adminhtml/session')->setSlideData(null);
      } elseif ( Mage::registry('slide_data') ) {
          $form->setValues(Mage::registry('slide_data')->getData());
      }
      return parent::_prepareForm();
  }
}
