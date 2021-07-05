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
 * This class captures the various fields that can be displayed upon checkin
 *
 * the options here are currently hardcoded, but could later be dynamically extended without changing the
 *   interface
 */
class CRM_Eventcheckin_CheckinFields
{
    const PARTICIPANT_FIELDS = "id,event_id,participant_status,participant_status_id,participant_register_date,display_name,contact_id,participant_role";
    const CONTACT_FIELDS = "id,first_name,display_name,last_name";
    const EVENT_FIELDS = "id,title,start_date,end_date,is_active";

    /**
     * Get a list of all field specs that _could_ be displayed
     *  on the checkin screen to verify the participant
     *
     * tip: if you want to add fields here, you might also have to adjust the XX_FIELDS constants above
     *
     * @return array
     *   list of field specs
     */
    public static function allFields()
    {
        return [
            'first_name'   => [
                'name'        => 'first_name',
                'type'        => 'Text',
                'path'        => 'contact.first_name',
                'label'       => E::ts('First Name'),
            ],
            'last_name'    => [
                'name'        => 'last_name',
                'type'        => 'Text',
                'path'        => 'contact.last_name',
                'label'       => E::ts('Last Name'),
            ],
            'display_name'    => [
                'name'        => 'display_name',
                'type'        => 'Text',
                'path'        => 'contact.display_name',
                'label'       => E::ts('Display Name'),
            ],
            'display_name_link' => [
                'name'        => 'display_name_link',
                'type'        => 'Text',
                'path'        => 'contact.display_name',
                'label'       => E::ts('Contact Link'),
            ],
            'participant_link' => [
                'name'        => 'participant_link',
                'type'        => 'Text',
                'path'        => 'participant.display_name',
                'label'       => E::ts('Participant Link'),
            ],
            'event_title'    => [
                'name'        => 'event_title',
                'type'        => 'Text',
                'path'        => 'event.title',
                'label'       => E::ts('Event Title'),
            ],
            'participant_status'    => [
                'name'        => 'participant_status',
                'type'        => 'Text',
                'path'        => 'participant.participant_status',
                'label'       => E::ts('Participant Status'),
            ],
            'registration_date'    => [
                'name'        => 'registration_date',
                'type'        => 'Date',
                'path'        => 'participant.participant_register_date',
                'label'       => E::ts('Registration Date'),
            ],
        ];

    }

    /**
     * Get a list of of participant statuses that are considered checked-in
     *
     * @return array
     *   [participant_status_id =>  participant_status_label]
     */
    public static function getCheckedInStatusList()
    {
        $result = [];
        $checked_in_status_list = Civi::settings()->get('event_checked_in_status_list');
        if (!empty($checked_in_status_list) && is_array($checked_in_status_list)) {
            $status_types = civicrm_api3('ParticipantStatusType', 'get', [
                'id' => ['IN' => $checked_in_status_list],
                'return' => 'id,name,label',
                'sequential' => 0,
            ])['values'];
            foreach ($checked_in_status_list as $checked_in_status_id) {
                if (isset($status_types[$checked_in_status_id])) {
                    $result[$checked_in_status_id] = $status_types[$checked_in_status_id]['label'];
                }
            }
        }
        return $result;
    }
    /**
     * List of field_id => field_label if all eligible fields
     *
     * @return array
     *   field list
     */
    public static function getFieldList()
    {
        $field_list = [];
        $all_fields = self::allFields();
        foreach ($all_fields as $field_spec) {
            $field_list[$field_spec['name']] = $field_spec['label'];
        }

        return $field_list;
    }

    /**
     * Get the participant object
     *
     * @param integer $participant_id
     *   the participant id
     */
    public static function getParticipantFields($participant_id)
    {
        $result = [];
        $all_fields = self::allFields();
        $fields_enabled = Civi::settings()->get('event_verification_fields');
        if (!empty($fields_enabled)) {
             foreach ($fields_enabled as $field_name) {
                 if (!isset($all_fields[$field_name])) {
                     Civi::log()->warning("EventCheckin: field '{$field_name}' is not defined, please revisit your configuration");
                     continue;
                 }
                 $field_spec = $all_fields[$field_name];
                 $field_spec['value'] = self::getFieldValue($field_spec, $participant_id);
                 $result[] = $field_spec;
             }
        }
        return $result;
    }

    /**
     * Extract the field value for the given field spec
     *
     * @param array $field_spec
     *   see self::allFields
     *
     * @param integer $particpant_id
     *   participant id
     *
     * @return mixed value
     */
    public static function getFieldValue($field_spec, $particpant_id)
    {
        // get entity
        [$entity, $field_name] = explode('.', $field_spec['path'], 2);
        switch (strtolower($entity)) {
            case 'participant':
                $entity_data = self::getParticipant($particpant_id);
                break;

            case 'event':
                $entity_data = self::getEventForParticipant($particpant_id);
                break;

            case 'contact':
                $entity_data = self::getContactForParticipant($particpant_id);
                break;

            default:
                $entity_data = [];
        }

        // get field value
        switch (strtolower($field_spec['name'])) {
            case 'display_name_link':
                return E::ts('<a href="%1" target="_blank">%2 [%3]</a>', [
                    1 => CRM_Utils_System::url('civicrm/contact/view', "reset=1&cid={$entity_data['id']}"),
                    2 => $entity_data['display_name'],
                    3 => $entity_data['id'],
                ]);

            case 'participant_link':
                return E::ts('<a href="%1" target="_blank" class="crm-popup small-popup">%2 [%3]</a>', [
                    1 => CRM_Utils_System::url('civicrm/contact/view/participant', "reset=1&id={$entity_data['id']}&cid={$entity_data['contact_id']}&action=view"),
                    2 => $entity_data['display_name'],
                    3 => $entity_data['id'],
                ]);

            default:
                return CRM_Utils_Array::value($field_name, $entity_data);
        }
    }

    /**
     * Get the participant object
     *
     * @param integer $participant_id
     *   the participant id
     *
     * @return array participant data
     */
    public static function getParticipant($participant_id)
    {
        static $participant = [];
        if (!isset($participant[$participant_id])) {
            $participant[$participant_id] = civicrm_api3(
                'Participant',
                'getsingle',
                [
                    'id' => $participant_id,
                    'return' => self::PARTICIPANT_FIELDS
                ]
            );
        }
        return $participant[$participant_id];
    }

    /**
     * Get the contact object for the participant
     *
     * @param integer $participant_id
     *   the participant id
     *
     * @return array contact data
     */
    public static function getContactForParticipant($participant_id)
    {
        $participant = self::getParticipant($participant_id);
        if (empty($participant['contact_id'])) {
            return [];
        }

        $contact_id = $participant['contact_id'];
        static $contact = [];
        if (!isset($contact[$contact_id])) {
            $contact[$contact_id] = civicrm_api3(
                'Contact',
                'getsingle',
                [
                    'id' => $contact_id,
                    'return' => self::CONTACT_FIELDS
                ]
            );
        }
        return $contact[$contact_id];
    }

    /**
     * Get the event object for the participant
     *
     * @param integer $participant_id
     *   the participant id
     *
     * @return array event data
     */
    public static function getEventForParticipant($participant_id)
    {
        $participant = self::getParticipant($participant_id);
        if (empty($participant['event_id'])) {
            return [];
        }

        $event_id = $participant['event_id'];
        static $event = [];
        if (!isset($event[$event_id])) {
            $event[$event_id] = civicrm_api3(
                'Event',
                'getsingle',
                [
                    'id' => $event_id,
                    'return' => self::EVENT_FIELDS
                ]
            );
        }
        return $event[$event_id];
    }
}
