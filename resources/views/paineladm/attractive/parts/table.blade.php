

<tr>
<td id>Problema e visão</td>
@if($startup['category'] == 'tração')
<td>O critério “Problema e Visão” avalia se o time pode demonstrar por que oferece uma proposta de valor superior aos clientes do que a de seus concorrentes e se sabem não apenas sobre os concorrentes agora, mas para onde estão indo.</td>
@endif

@if($startup['category'] == 'criação')
<td>O critério “Problema e Visão” avalia se o time identificou um problema específico, importante e grande e articulou claramente o problema que estão solucionando.</td>
@endif
<td>
	<select class="custom-select" name="avalicacao[criterio][12][nota]" required>
		<option value="" >Nota</option>
		<option value="1" >1 -  Em fase de definição.</option>
		<option value="2" >2 -  Definido, mas ainda pouco conhecido.</option>
		<option value="3" >3 -  Definido, mas não validado.</option>
		<option value="4" >4 -  Definido e validado.</option>
		<option value="5" >5 -  Definido, validado e relevante.</option>
	</select>
</td>
</tr>


<tr>
<td id>Problema e clusters regional </td>
<td>O critério "Problema e Clusters Regional" avalia se o time identificou um problema específico da região. <br>
Acesse a listagem dos problemas <a href="/files/PCD - Clusters - Oportunidades.pdf" target="_blank" >AQUI</a>
</td>
<td>
	<select class="custom-select" name="avalicacao[criterio][13][nota]" required>
		<option value="" >Nota</option>
		<option value="1" >1 -  Sim</option>
		<option value="0" >0 -  Não</option>
	</select>
</td>
</tr>


<tr>
<td id>Proposta de valor</td>
@if($startup['category'] == 'tração')
<td>O critério “Proposta de Valor” avalia se o time tem evidências captadas por meio de testes rigorosos que demonstram que os clientes pagarão o preço-alvo e se possuem um número considerável de clientes em potencial.</td>
@endif
@if($startup['category'] == 'criação')
<td>O critério “Proposta de Valor” avalia se o time tem uma hipótese de como resolver o problema e pode explicá-la aos clientes.</td>
@endif
<td>
	<select class="custom-select" name="avalicacao[criterio][14][nota]" required>
		<option value="" >Nota</option>
		<option value="1" >1 -  O produto não apresenta novidade técnica ou mercadológica.</option>
		<option value="2" >2 -  O produto apresenta novidades técnicas ou mercadológicas pouco perceptíveis em relação às soluções existentes; </option>
		<option value="3" >3 -  O produto apresenta significativas novidades técnicas ou mercadológicas em relação às soluções similares; </option>
		<option value="4" >4 -  O produto apresenta novidades técnicas ou mercadológicas bastante diferentes das soluções similares;</option>
        <option value="5">5 – O produto é disruptivo.</option>
	</select>
</td>
</tr>


<tr>
<td id>Produto</td>
@if($startup['category'] == 'tração')
<td>O critério “Produto” avalia se o time criou um protótipo funcional e tem um roadmap de produto que expresse uma ideia firme do nível em que o produto chegará futuramente.</td>
@endif
@if($startup['category'] == 'criação')
<td>O critério “Produto” avalia se o time tem as habilidades técnicas necessárias para construir um protótipo e se não há obstáculos jurídicos o impedindo de construir o produto.</td>
@endif
<td>
	<select class="custom-select" name="avalicacao[criterio][15][nota]" required>
		<option value="" >Nota</option>
		<option value="1" >1 -  O produto não apresenta nenhuma possibilidade de resolver o problema do cliente no momento;</option>
		<option value="2" >2 -  O produto apresenta indícios de possíveis modos de resolver o problema do cliente, mas suas funcionalidades ainda precisam ser melhor definidas; </option>
		<option value="3" >3 -  O produto apresenta modos de resolver o problema do cliente bem definidos, mas suas funcionalidades precisam de testes para serem consideradas plausíveis; </option>
		<option value="4" >4 -  O produto apresenta modos plausíveis de resolver o problema do cliente, mas o excesso de funcionalidades poderá dificultar o seu desenvolvimento e lançamento; </option>
		<option value="5" >5 -  O produto apresenta um número essencial de funcionalidades bem definidas, plausíveis e imprescindíveis para cumprir a finalidade para a qual foi planejado.</option>
	</select>
</td>
</tr>


<tr>
<td id>Mercado</td>
@if($startup['category'] == 'tração')
<td>O critério “Mercado” avalia se o time está entrando no mercado e se testes prévios fornecem evidências de que o time pode conquistar o mercado-alvo.</td>
@endif
@if($startup['category'] == 'criação')
<td>O critério “Mercado” avalia se o time conhece o tamanho total de mercado atendível e têm uma meta de participação de mercado.</td>
@endif
<td>
	<select class="custom-select" name="avalicacao[criterio][16][nota]" required>
		<option value="" >Nota</option>
		<option value="1" >1 -  O mercado do produto não apresenta potencial econômico, não está estruturado e não há players nacionais e internacionais; </option>
		<option value="2" >2 -  O mercado do produto tem pouco potencial econômico, é pouco estruturado e com poucos players;</option>1
		<option value="3" >3 -  O mercado do produto tem um potencial econômico significativo, razoavelmente estruturado e com alguns players; </option>
		<option value="4" >4 -  O mercado do produto tem um elevado potencial econômico, é bem estruturado, mas com a presença de poucos players; </option>
		<option value="5" >5 -  O mercado do produto tem um elevado potencial econômico, é bem estruturado e com presença de muitos players.</option>
	</select>
</td>
</tr>


@if($startup['category'] == 'tração')
<tr>
	<td id>Modelo de receita</td>
	@if($startup['category'] == 'tração')
	<td>O critério “Modelo de Receita” avalia se o time pode explicar a estrutura de custos e a economia unitária de seu setor, se sabe o custo de criar produtos como os seus e se tem metas de custo para alcançar uma economia unitária positiva</td>
	@endif
	<td>
		<select class="custom-select" name="avalicacao[criterio][10][nota]" required>
			<option value="" >Nota</option>
			@if($startup['category'] == 'tração')
			<option value="1" >1 -  Sem modelo definido de monetização.</option>
			<option value="2" >2 -  Monetização definida, mas ainda não validada.</option>
			<option value="3" >3 -  Modelo validado de monetização, mas sem dados de vendas consistentes.</option>
			<option value="4" >4 -  Modelo definido e validado de monetização, já com dados comprovadores.</option>
			<option value="5" >5 -  Modelo financeiro com evidência de projeções validadas para alcançar lucro.</option>
			@endif
		</select>
	</td>
</tr>
<tr>
	<td id>Escala</td>
	@if($startup['category'] == 'tração')
	<td>O critério “Escala” avalia se o time tem uma estratégia clara de expansão para vários mercados além do mercado-alvo inicial e se tem uma estratégia para executar a mudança e ter sucesso nos próximos mercados.</td>
	@endif
	<td>
		<select class="custom-select" name="avalicacao[criterio][11][nota]" required>
			<option value="" >Nota</option>
			@if($startup['category'] == 'tração')
			<option value="1" >1 -  Sem produto definido e nem a forma de vendê-lo.</option>
			<option value="2" >2 -  Sem modelo de negócios definido. </option>
			<option value="3" >3 -  Apresenta produto e o modelo definido, mas não tem definido o segmento que irá escalar. </option>
			<option value="4" >4 -  Modelo de negócios e produtos maduros, mas ainda não começou a escalar. </option>
			<option value="5" >5 -  Modelo de negócios e produtos maduros, e já estão escalando.</option>
			@endif
		</select>
	</td>
</tr>
@endif

<tr>
<td colspan="2" >Você considera que o projeto avaliado realmente está apto para participar de um programa de empreendedorismo inovador?</td>
<td>
	<select class="custom-select" name="avalicacao[criterio][17][nota]" required>
		<option value="" >Nota</option>
		<option value="1" >1 -  Sim</option>
		<option value="0" >0 -  Não</option>
	</select>
</td>
</tr>
