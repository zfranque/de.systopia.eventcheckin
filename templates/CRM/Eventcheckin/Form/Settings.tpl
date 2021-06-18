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

  <div>
    <span>{$form.token_timeout.label}&nbsp;{help id="id-token-timeout" title=$form.token_timeout.label}</div>
    <span>{$form.token_timeout.html}</span>
  </div>

  <div>
    <span>{$form.external_link.label}&nbsp;{help id="id-external-link" title=$form.external_link.label}</div>
    <span>{$form.external_link.html}</span>
  </div>

  <div class="crm-submit-buttons">
    {include file="CRM/common/formButtons.tpl" location="bottom"}
  </div>

{/crmScope}

