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
 * Form controller class
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/quickform/
 */
class CRM_Eventcheckin_Form_Settings extends CRM_Core_Form
{
    public function buildQuickForm()
    {
        // add form elements
        $this->add(
            'text',
            'external_link',
            E::ts("Custom Link"),
            ['class' => 'huge'],
            false
        );

        $this->add(
            'select',
            'token_timeout',
            E::ts("Token Timeout"),
            [
                ''         => 'never',
                "+1 week"  => '1 week',
                "+1 month" => '1 month',
            ],
            false,
            [
                'class' => 'crm-select2',
            ]
        );

        $this->setDefaults([
           'external_link' => Civi::settings()->get('event_checkin_link'),
           'token_timeout' => Civi::settings()->get('event_checkin_timeout'),
        ]);

        $this->addButtons(
            [
                [
                    'type' => 'submit',
                    'name' => E::ts('Save'),
                    'isDefault' => true,
                ],
            ]
        );
        parent::buildQuickForm();
    }

    public function postProcess()
    {
        $values = $this->exportValues();
        Civi::settings()->set('event_checkin_link',    $values['external_link']);
        Civi::settings()->set('event_checkin_timeout', $values['token_timeout']);

        CRM_Core_Session::setStatus(E::ts("Settings Updated"));
        parent::postProcess();
    }

}
