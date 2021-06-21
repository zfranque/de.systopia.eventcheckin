<?php
/*-------------------------------------------------------+
| SYSTOPIA Event Checkin                                 |
| Copyright (C) 2021 SYSTOPIA                            |
| Author: B. Endres (endres@systopia.de)                 |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

use CRM_Eventcheckin_ExtensionUtil as E;

/**
 * Event Check-In form
 */
class CRM_Eventcheckin_Form_CheckIn extends CRM_Core_Form
{
    /** @var string the token currently being used */
    protected $token;

    public function buildQuickForm()
    {
        // title
        $this->setTitle(E::ts("Event Check-In"));

        // get token
        $this->token = CRM_Utils_Request::retrieve('token', 'String', $this);

        // verify token
        $error_message = null;
        try {
            $checkin_data = civicrm_api3('EventCheckin', 'verify', ['token' => $this->token]);
            $this->assign('fields', $checkin_data['values']);

            // add buttons
            $buttons = [];
            foreach ($checkin_data['checkin_options'] as $status_id => $status_label) {
                $buttons[] = [
                    'type'  => "submit_{$status_id}",
                    'name' => E::ts('Check-In (%1)', [1 => $status_label]),
                ];
            }
            $this->addButtons($buttons);

        } catch (CiviCRM_API3_Exception $ex) {
            $error_message = $ex->getMessage();
            $this->assign('error_message', $error_message);
        }
        parent::buildQuickForm();
    }

    public function postProcess()
    {
        $values = $this->exportValues();
        parent::postProcess();
    }
}
