{*шаблон главной страницы*}

{foreach $rsProducts as $item name=products}
	<div style="float: left; padding: 0px 30px 40px 0px;">
		<a href="/product/{$item['id']}/">
			<img src="/images/products/{$item['image']}" width="100" />
		</a> <br/>
		<a href="/product/{$item['id']}/"> {$item['name']} </a>
	</div>
	
	{if $smarty.foreach.products.iteration mod 3 == 0}
		<div style="clear: both;"> </div>
	{/if}

{/foreach}

<div class="pagination">
	{if $paginator['currentPage'] != 1}
		<span class='p_prev'><a href="{$paginator['link']}{$paginator['currentPage'] - 1}">$nbsp;</a></span>
	{/if}

	<strong><span>{$paginator['currentPage']}</span></strong>

	{if $paginator['currentPage'] < $paginator['pageCnt']}
		<span class="p_next"><a href="{$paginator['link']}{$paginator['currentPage']+1}">$nbsp</a></span>
	{/if}
</div>