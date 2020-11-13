

<tr>
<td id>Problema e visão</td>
@if($startup['category'] == 'tração')
<td>O critério “Problema e Visão” avalia se o time pode demonstrar por que oferece uma proposta de valor superior aos clientes do que a de seus concorrentes e se sabem não apenas sobre os concorrentes agora, mas para onde estão indo.</td>
@endif

@if($startup['category'] == 'criação')
<td>O critério “Problema e Visão” avalia se o time identificou um problema específico, importante e grande e articulou claramente o problema que estão solucionando.</td>
@endif
<td>
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
		<input type="radio" id="avaliacao_criterio_12_1" name="avalicacao[criterio][12][nota]" value="1" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_12_1" style="width:90%; color: black;">
			1 -  Em fase de definição.
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_12_2" name="avalicacao[criterio][12][nota]" value="2" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_12_2" style="width:90%; color: black;">
			2 -  Definido, mas ainda pouco conhecido.
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_12_3" name="avalicacao[criterio][12][nota]" value="3" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_12_3" style="width:90%; color: black;">
			3 -  Definido, mas não validado.
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_12_4" name="avalicacao[criterio][12][nota]" value="4" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_12_4" style="width:90%; color: black;">
			4 -  Definido e validado.
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_12_5" name="avalicacao[criterio][12][nota]" value="5" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_12_5" style="width:90%; color: black;">
			5 -  Definido, validado e relevante.
		</label>
</div>
</td>
</tr>


<tr>
<td id>Problema e clusters regional </td>
<td>O critério "Problema e Clusters Regional" avalia se o time identificou um problema específico da região. <br>
Acesse a listagem dos problemas <a href="/files/PCD - Clusters - Oportunidades.pdf" target="_blank" >AQUI</a>
</td>
<td>
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
		<input type="radio" id="avaliacao_criterio_13_1" name="avalicacao[criterio][13][nota]" value="1" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_13_1" style="width:90%; color: black;">
			1 -  Sim
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_13_0" name="avalicacao[criterio][13][nota]" value="0" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_13_0" style="width:90%; color: black;">
			0 -  Não
		</label>
</div>
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
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
		<input type="radio" id="avaliacao_criterio_14_1" name="avalicacao[criterio][14][nota]" value="1" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_14_1" style="width:90%; color: black;">
			1 -  O produto não apresenta novidade técnica ou mercadológica.
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_14_2" name="avalicacao[criterio][14][nota]" value="2" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_14_2" style="width:90%; color: black;">
			2 -  O produto apresenta novidades técnicas ou mercadológicas pouco perceptíveis em relação às soluções existentes; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_14_3" name="avalicacao[criterio][14][nota]" value="3" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_14_3" style="width:90%; color: black;">
			3 -  O produto apresenta significativas novidades técnicas ou mercadológicas em relação às soluções similares; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_14_4" name="avalicacao[criterio][14][nota]" value="4" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_14_4" style="width:90%; color: black;">
			4 -  O produto apresenta novidades técnicas ou mercadológicas bastante diferentes das soluções similares;
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
        <input type="radio" id="avaliacao_criterio_14_5" name="avalicacao[criterio][14][nota]" value="5" style="width:20px;height:20px;" required="true" >
    	<label for="avaliacao_criterio_14_5" style="width:90%; color: black;">
    		5 – O produto é disruptivo.
    	</label>
    	<hr style="margin-bottom: 10px;margin-top: 0px;">
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
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
		<input type="radio" id="avaliacao_criterio_15_1" name="avalicacao[criterio][15][nota]" value="1" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_15_1" style="width:90%; color: black;">
			1 -  O produto não apresenta nenhuma possibilidade de resolver o problema do cliente no momento;
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_15_2" name="avalicacao[criterio][15][nota]" value="2" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_15_2" style="width:90%; color: black;">
			2 -  O produto apresenta indícios de possíveis modos de resolver o problema do cliente, mas suas funcionalidades ainda precisam ser melhor definidas; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_15_3" name="avalicacao[criterio][15][nota]" value="3" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_15_3" style="width:90%; color: black;">
			3 -  O produto apresenta modos de resolver o problema do cliente bem definidos, mas suas funcionalidades precisam de testes para serem consideradas plausíveis; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_15_4" name="avalicacao[criterio][15][nota]" value="4" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_15_4" style="width:90%; color: black;">
			4 -  O produto apresenta modos plausíveis de resolver o problema do cliente, mas o excesso de funcionalidades poderá dificultar o seu desenvolvimento e lançamento; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_15_5" name="avalicacao[criterio][15][nota]" value="5" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_15_5" style="width:90%; color: black;">
			5 -  O produto apresenta um número essencial de funcionalidades bem definidas, plausíveis e imprescindíveis para cumprir a finalidade para a qual foi planejado.
		</label>
</div>
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
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
		<input type="radio" id="avaliacao_criterio_16_1" name="avalicacao[criterio][16][nota]" value="1" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_16_1" style="width:90%; color: black;">
			1 -  O mercado do produto não apresenta potencial econômico, não está estruturado e não há players nacionais e internacionais; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_16_2" name="avalicacao[criterio][16][nota]" value="2" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_16_2" style="width:90%; color: black;">
			2 -  O mercado do produto tem pouco potencial econômico, é pouco estruturado e com poucos players;
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_16_3" name="avalicacao[criterio][16][nota]" value="3" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_16_3" style="width:90%; color: black;">
			3 -  O mercado do produto tem um potencial econômico significativo, razoavelmente estruturado e com alguns players; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_16_4" name="avalicacao[criterio][16][nota]" value="4" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_16_4" style="width:90%; color: black;">
			4 -  O mercado do produto tem um elevado potencial econômico, é bem estruturado, mas com a presença de poucos players; 
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_16_5" name="avalicacao[criterio][16][nota]" value="5" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_16_5" style="width:90%; color: black;">
			5 -  O mercado do produto tem um elevado potencial econômico, é bem estruturado e com presença de muitos players.
		</label>
</div>
</td>
</tr>


@if($startup['category'] == 'tração')
<tr>
	<td id>Modelo de receita</td>
	@if($startup['category'] == 'tração')
	<td>O critério “Modelo de Receita” avalia se o time pode explicar a estrutura de custos e a economia unitária de seu setor, se sabe o custo de criar produtos como os seus e se tem metas de custo para alcançar uma economia unitária positiva</td>
	@endif
	<td>
			@if($startup['category'] == 'tração')
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
			<input type="radio" id="avaliacao_criterio_10_1" name="avalicacao[criterio][10][nota]" value="1" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_10_1" style="width:90%; color: black;">
				1 -  Sem modelo definido de monetização.
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_10_2" name="avalicacao[criterio][10][nota]" value="2" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_10_2" style="width:90%; color: black;">
				2 -  Monetização definida, mas ainda não validada.
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_10_3" name="avalicacao[criterio][10][nota]" value="3" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_10_3" style="width:90%; color: black;">
				3 -  Modelo validado de monetização, mas sem dados de vendas consistentes.
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_10_4" name="avalicacao[criterio][10][nota]" value="4" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_10_4" style="width:90%; color: black;">
				4 -  Modelo definido e validado de monetização, já com dados comprovadores.
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_10_5" name="avalicacao[criterio][10][nota]" value="5" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_10_5" style="width:90%; color: black;">
				5 -  Modelo financeiro com evidência de projeções validadas para alcançar lucro.
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			@endif
		</td>
</tr>
<tr>
	<td id>Escala</td>
	@if($startup['category'] == 'tração')
	<td>O critério “Escala” avalia se o time tem uma estratégia clara de expansão para vários mercados além do mercado-alvo inicial e se tem uma estratégia para executar a mudança e ter sucesso nos próximos mercados.</td>
	@endif
	<td>
			@if($startup['category'] == 'tração')
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
			<input type="radio" id="avaliacao_criterio_11_1" name="avalicacao[criterio][11][nota]" value="1" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_11_1" style="width:90%; color: black;">
				1 -  Sem produto definido e nem a forma de vendê-lo.
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_11_2" name="avalicacao[criterio][11][nota]" value="2" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_11_2" style="width:90%; color: black;">
				2 -  Sem modelo de negócios definido. 
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_11_3" name="avalicacao[criterio][11][nota]" value="3" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_11_3" style="width:90%; color: black;">
				3 -  Apresenta produto e o modelo definido, mas não tem definido o segmento que irá escalar. 
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_11_4" name="avalicacao[criterio][11][nota]" value="4" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_11_4" style="width:90%; color: black;">
				4 -  Modelo de negócios e produtos maduros, mas ainda não começou a escalar. 
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			<input type="radio" id="avaliacao_criterio_11_5" name="avalicacao[criterio][11][nota]" value="5" style="width:20px;height:20px;" required="true" >
			<label for="avaliacao_criterio_11_5" style="width:90%; color: black;">
				5 -  Modelo de negócios e produtos maduros, e já estão escalando.
			</label>
			<hr style="margin-bottom: 10px;margin-top: 0px;">
			@endif
		</td>
</tr>
@endif

<tr>
<td colspan="2" >Você considera que o projeto avaliado realmente está apto para participar de um programa de empreendedorismo inovador?</td>
<td>
<div style="max-height: 180px;overflow: overlay;background: palegreen;padding: 10px;">
		<input type="radio" id="avaliacao_criterio_17_1" name="avalicacao[criterio][17][nota]" value="1" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_17_1" style="width:90%; color: black;">
			1 -  Sim
		</label>
		<hr style="margin-bottom: 10px;margin-top: 0px;">
		<input type="radio" id="avaliacao_criterio_17_0" name="avalicacao[criterio][17][nota]" value="0" style="width:20px;height:20px;" required="true" >
		<label for="avaliacao_criterio_17_0" style="width:90%; color: black;">
			0 -  Não
		</label>
</div>
</td>
</tr>
