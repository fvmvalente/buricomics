<?php include 'topo.php'; ?>

<section class="conteudo">
	<div class="centralizar clearfix">
		<article class="texto">
			<h1 class="titulo">Contato</h1>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
				quaerat repudiandae ratione laudantium libero, animi enim dolor ut
				facere ducimus! Est neque porro optio. Quo ducimus pariatur error
				accusamus provident!</p>
		</article>

		<form action="actions/contato.php" method="post">
			<div class="clearfix">
				<div class="coluna metade pr">
					<fieldset class="fieldset">
						<h2 class="titulo-form">Informações Pessoais</h2>

						<div>
							<label for="conNome">Nome:</label> <input class="controle"
								id="conNome" name="conNome" type="text" required />
						</div>

						<div class="coluna w30 pr">
							<label for="conIdade">Idade:</label> <input class="controle"
								id="conIdade" name="conIdade" type="text" required />
						</div>

						<div class="coluna w70 pl">
							<label for="">Sexo:</label> <br />
							<div class="coluna metade">
								<input id="conMasculino" name="conSexo" type="radio"
									value="Masculino" required /> <label for="conMasculino">Masculino</label>
							</div>

							<div class="coluna metade">
								<input id="conFeminino" name="conSexo" type="radio"
									value="Feminino" required /> <label for="conFeminino">Feminino</label>
							</div>
						</div>

						<div style="clear: both;"></div>

						<div class="coluna w70 pl">
							<label for="">Melhor horário para contato:</label> <br />
							<div class="coluna metade">
								<input id="manha" name="conHorario[]" type="checkbox"
									value="Manhã" /> <label for="manha">Manhã</label>
							</div>

							<div class="coluna metade">
								<input id="tarde" name="conHorario[]" type="checkbox"
									value="Tarde" /> <label for="tarde">Tarde</label>
							</div>

							<div class="coluna metade">
								<input id="noite" name="conHorario[]" type="checkbox"
									value="Noite" /> <label for="noite">Noite</label>
							</div>

							<div class="coluna metade">
								<input id="qualquer" name="conHorario[]" type="checkbox"
									value="Qualquer horário" /> <label for="qualquer">Qualquer
									horário</label>
							</div>
						</div>


					</fieldset>
				</div>

				<div class="coluna metade pl">
					<fieldset class="fieldset">
						<h2 class="titulo-form">Informações de Contato</h2>

						<div>
							<label for="conEmail">E-mail:</label> <input class="controle"
								id="conEmail" name="conEmail" type="email" required />
						</div>

						<div class="coluna metade pr">
							<label for="conCidade">Cidade:</label> <input class="controle"
								id="conCidade" name="conCidade" type="text" required />
						</div>
                        <?php
                        $estados = array(
                            "AM",
                            "AC",
                            "AP",
                            "RR",
                            "RO",
                            "PA",
                            "MT",
                            "MS",
                            "BA",
                            "CE",
                            "MG",
                            "SP",
                            "DF",
                            "RJ",
                            "ES",
                            "MA",
                            "PR",
                            "RS",
                            "SC",
                            "PE",
                            "PI",
                            "RN",
                            "SE",
                            "PB",
                            "AL",
                            "GO",
                            "TO"
                        );
                        
                        ?>
                        <div class="coluna metade pl">
							<label for="conEstado">Estado:</label> <select class="controle"
								id="conEstado" name="conEstado" required>
								<option value="">Selecione</option>
								<?php foreach($estados as $estado){ ?>
								<option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
								<?php //echo "<option value=\"$estado\">$estado</option>"?>
								<?php } ?>
							</select>
						</div>

						<div class="coluna metade pr">
							<label for="conTelefone">Telefone:</label> <input
								class="controle" id="conTelefone" name="conTelefone" type="text"
								required />
						</div>

					</fieldset>
				</div>
			</div>

			<fieldset class="fieldset fieldset-mensagem">
				<h2 class="titulo-form">Mensagem</h2>

				<div>
					<label for="conMensagem">Mensagem:</label>
					<textarea class="controle" id="conMensagem" name="conMensagem"
						required></textarea>
				</div>
			</fieldset>

			<button type="submit" class="btn">Enviar</button>
		</form>
	</div>
</section>

<?php include 'rodape.php'; ?>