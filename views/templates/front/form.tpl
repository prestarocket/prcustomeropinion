<h2>{l s='Give your opinion' mod='prcustomeropinion'}</h2>

<form method="post" class="std">
	<fieldset>
	<label for="opinion" id="opinion">{l s='Our website is...' mod='prcustomeropinion'}</label>
	<select name="opinion">
		<option>--</option>
		<option value="VERY_GOOD">{l s='Very Good' mod='prcustomeropinion'}</option>
		<option value="GOOD">{l s='Good' mod='prcustomeropinion'}</option>
		<option value="AVERAGE">{l s='Average' mod='prcustomeropinion'}</option>
	</select>
	<input type="submit" class="button" value="{l s='Give my opinion' mod='prcustomeropinion'}" />
	</fieldset>
</form>

<hr />

<h3>{l s='What people think' mod='prcustomeropinion'}</h3>

<table style="width: 100%;">
{foreach from=$opinions item=opinion}
	<tr>
		<td>{$opinion->getCustomerName()}</td>
		<td>{$opinion->opinion}</td>
	</tr>
	
{/foreach}
</table>
