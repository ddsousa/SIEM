<div id="filters">

	<select id="filter-sort" class="dropdown" onchange="sortOrdersBy(this)">
		<option disabled selected>Ordenar</option>
		<option value="name" {if isset($sort_by)}{if $sort_by eq 'name'}selected{/if}{/if}>Nome</option>
		<option value="date_desc" {if isset($sort_by)}{if $sort_by eq 'date_desc'}selected{/if}{/if}>Mais recente</option>
		<option value="date_asc" {if isset($sort_by)}{if $sort_by eq 'date_asc'}selected{/if}{/if}>Mais antiga</option>
		<option value="price_asc" {if isset($sort_by)}{if $sort_by eq 'price_asc'}selected{/if}{/if}>Preço mais baixo</option>
		<option value="price_desc" {if isset($sort_by)}{if $sort_by eq 'price_desc'}selected{/if}{/if}>Preço mais alto</option>
	</select>
</div>
