{include file="header.tpl"}
	<table>
		{foreach from=$recipes item="recipe"}
		<tr>
			<td>
				{$recipe.title}
			</td>
			<td>
				{$recipe.category}
			</td>
			<td>
				{$recipe.created_by}
			</td>
			<td>
				{$recipe.created_on}
			</td>
		</tr>
		{/foreach}
	</table>
{include file="footer.tpl"}