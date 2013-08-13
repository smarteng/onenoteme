<?php
class AdminFeedback extends Feedback
{
    /**
     * Returns the static model of the specified AR class.
     * @return AdminFeedback the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getDeleteUrl()
    {
        return url('admin/feedback/delete', array('id'=>$this->id));
    }
}