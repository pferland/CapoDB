<table>
	<tr>
		<td>
			<h2>{$Recipe.title}</h2>
		</td>
	</tr>
	<tr>
		<td>
			{$Recipe.description}
		</td>
	</tr>
	<tr>
		{foreach from=$RecipePictures item=picture}
		<td>
			<a href="{$pictures.filename}"><img width="320" src="{$pictures.filename}" alt="{$picture.description}" ></a><br>
			{$picture.description}
		</td>
		{/foreach}
	</tr>
</table>