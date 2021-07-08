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
  <div class="crm-block crm-form-block crm-eventcheckin-form-block">

    <h3>{ts}Participant information{/ts}</h3>

    {if $status_message}
      {include file="CRM/common/info.tpl" infoType="no-popup crm-eventcheckin-message crm-eventcheckin-$status_type" infoMessage=$status_message}
    {/if}

    {if !$status_message and $show_buttons_top}
    <div class="crm-submit-buttons">
      {include file="CRM/common/formButtons.tpl" location="top"}
    </div>
    {/if}

    {foreach from=$fields item=field}
      <div class="crm-section crm-eventcheckin crm-eventcheckin-attributes">
        <div class="label">{$field.label}</div>
        <div class="content">{$field.value}</div>
        <div class="clear"></div>
      </div>
    {/foreach}

    {if !$status_message and $show_buttons_bottom}
      <div class="crm-submit-buttons">
        {include file="CRM/common/formButtons.tpl" location="bottom"}
      </div>
    {/if}

  </div>
{/crmScope}
