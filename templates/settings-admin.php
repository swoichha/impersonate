<?php
script('impersonate', 'settings-admin');
style('impersonate', 'settings-admin');
?>
<div class="section" id="impersonateTemplateSettings" >

	<h2><?php p($l->t('Impersonate Settings'));?></h2>

	<p class="<?php if (\OC::$server->getAppConfig()->getValue('impersonate', 'enabled', 'no') === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="impersonate_include_groups" id="impersonateIncludeGroups" class="checkbox"
			value="1" <?php if (\OC::$server->getAppConfig()->getValue('impersonate', 'impersonate_include_groups', 'false') !== 'false') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="impersonateIncludeGroups"><?php p($l->t('Allow group admins to impersonate users from these groups'));?></label><br/>
	</p>
	<p id="selectIncludedGroups" class="indent <?php if (\OC::$server->getAppConfig()->getValue('impersonate', 'impersonate_include_groups', 'false') === 'false') {
	p('hidden');
} ?>">
		<input name="impersonate_include_groups_list" type="hidden" id="includedGroups" value="<?php
		$includeGroupList = \OC::$server->getAppConfig()->getValue('impersonate', 'impersonate_include_groups_list', []);
		$includeGroupList = \json_decode($includeGroupList);
		$listToPrint = \count($includeGroupList) > 0 ? \implode('|', $includeGroupList) : '';
		p($listToPrint);
		?>" style="width: 400px"/>
		<br />
	</p>

</div>

