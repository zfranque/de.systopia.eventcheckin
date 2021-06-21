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
        // TOKEN SETTINGS
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

        // CHECK-IN SETTINGS
        $this->add(
            'select',
            'checkin_permissions',
            E::ts("Permission(s) Required"),
            $this->getPermissionList(),
            false,
            [
                'class' => 'crm-select2 huge',
                'multiple' => 'multiple',
                'placeholder' => E::ts("disabled"),
            ]
        );
        $this->add(
            'select',
            'checkin_status_list',
            E::ts("Check-In Possible Status"),
            $this->getParticipantStatusTypes(),
            false,
            [
                'class' => 'crm-select2 huge',
                'multiple' => 'multiple',
                'placeholder' => E::ts("disabled"),
            ]
        );
        $this->add(
            'select',
            'checked_in_status_list',
            E::ts("Checked-In Status"),
            $this->getParticipantStatusTypes(),
            false,
            [
                'class' => 'crm-select2 huge',
                'multiple' => 'multiple',
                'placeholder' => E::ts("disabled"),
            ]
        );
        $this->add(
            'select',
            'verification_fields',
            E::ts("Fields to show for Verification"),
            CRM_Eventcheckin_CheckinFields::getFieldList(),
            false,
            [
                'class' => 'crm-select2 huge',
                'multiple' => 'multiple',
                'placeholder' => E::ts("none"),
            ]
        );


        $this->setDefaults([
           'external_link' => Civi::settings()->get('event_checkin_link'),
           'token_timeout' => Civi::settings()->get('event_checkin_timeout'),
           'checkin_permissions' => Civi::settings()->get('event_checkin_permissions'),
           'checkin_status_list' => Civi::settings()->get('event_checkin_status_list'),
           'checked_in_status_list' => Civi::settings()->get('event_checked_in_status_list'),
           'verification_fields' => Civi::settings()->get('event_verification_fields'),
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
        Civi::settings()->set('event_checkin_link', $values['external_link']);
        Civi::settings()->set('event_checkin_timeout', $values['token_timeout']);
        Civi::settings()->set('event_checkin_permissions', $values['checkin_permissions']);
        Civi::settings()->set('event_checkin_status_list', $values['checkin_status_list']);
        Civi::settings()->set('event_checked_in_status_list', $values['checked_in_status_list']);
        Civi::settings()->set('event_verification_fields', $values['verification_fields']);

        CRM_Core_Session::setStatus(E::ts("Settings Updated"));
        parent::postProcess();
    }

    /**
     * Get all participant status types
     */
    protected function getParticipantStatusTypes()
    {
        static $participant_status_list = null;
        if ($participant_status_list === null) {
            $participant_status_list = [];
            $query = civicrm_api3('ParticipantStatusType', 'get', [
                'option.limit' => 0,
                'return'       => 'id,label'
            ]);
            foreach ($query['values'] as $status) {
                $participant_status_list[$status['id']] = $status['label'];
            }
        }
        return $participant_status_list;
    }


    /**
     * Return a list of permission key -> label eligible for access control
     *
     */
    protected function getPermissionList()
    {
        $permission_list = [];
        $permissions = CRM_Core_Permission::assembleBasicPermissions(true);
        foreach ($permissions as $key => $permission_label) {
            $permission_list[$key] = $permission_label;
        }
        return $permission_list;
    }
}
