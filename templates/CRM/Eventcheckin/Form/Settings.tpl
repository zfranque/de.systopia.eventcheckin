{*-------------------------------------------------------+
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
+-------------------------------------------------------*}

{crmScope extensionKey='de.systopia.eventcheckin'}

  <h3>{ts}Tokens Settings{/ts}</h3>
  <div class="crm-section">
    <div class="label">{$form.token_timeout.label}&nbsp;{help id="id-token-timeout" title=$form.token_timeout.label}</div>
    <div class="content">{$form.token_timeout.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-section">
    <div class="label">{$form.external_link.label}&nbsp;{help id="id-external-link" title=$form.external_link.label}</div>
    <div class="content">{$form.external_link.html}</div>
    <div class="clear"></div>
  </div>

  <h3>{ts}Check-In Settings{/ts}</h3>
  <div class="crm-section">
    <div class="label">{$form.checkin_permissions.label}&nbsp;{help id="id-checkin-permissions" title=$form.checkin_permissions.label}</div>
    <div class="content">{$form.checkin_permissions.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-section">
    <div class="label">{$form.checkin_status_list.label}&nbsp;{help id="id-checkin-status-list" title=$form.checkin_status_list.label}</div>
    <div class="content">{$form.checkin_status_list.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-section">
    <div class="label">{$form.checked_in_status_list.label}&nbsp;{help id="id-checked-in-status-list" title=$form.checked_in_status_list.label}</div>
    <div class="content">{$form.checked_in_status_list.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-section">
    <div class="label">{$form.verification_fields.label}&nbsp;{help id="id-verification-fields" title=$form.verification_fields.label}</div>
    <div class="content">{$form.verification_fields.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-submit-buttons">
    {include file="CRM/common/formButtons.tpl" location="bottom"}
  </div>

{/crmScope}

