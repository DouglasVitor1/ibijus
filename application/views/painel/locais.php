<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
switch ($tela):
    case 'gerenciar':
        ?>
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title">
                        Locais
                    </h3>
                </div>
                <div>
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                        <a href="<?php echo base_url('locais/cadastrar') ?>" class="m-portlet__nav-link btn btn-lg m-btn botoes m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        erros_validacao();
        get_msg('msgok');
        get_msg('msgerro');
        ?>
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <table id="dataTable4" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
								<th>Nome</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $this->locais->get_locais()->result();
                            foreach ($query as $local) {

								if($local->uf == "MG"){
									
									$class = 'class="linhas"';
								}else{

									$class = '';
								}
                                ?>
									<tr <?php echo $class ?>>
										<td ><?php echo $local->nome ?></td>
										<td ><?php echo date('d/m/Y', strtotime($local->data)) ?></td>
										<td >
										
											<a href="<?php echo base_url('locais/editar/'.$local->id) ?>" class="m-portlet__nav-link btn btn-lg m-btn botoes m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-toggle="m-tooltip" title="" data-original-title="Editar">
												<i class="la la-pencil"></i>
											</a>
											
											<a data-id="<?php echo $local->id ?>" href="#" class="modal_excluir m-portlet__nav-link btn btn-lg m-btn btn-danger  m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-toggle="m-tooltip" title="Excluir" data-original-title="Excluir">
												<i class="la la-trash"></i>
											</a>
									
										</td>
									</tr>
								<?php
			
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Modal::Excluir-->
        <div class="modal fade" id="m_modal_excluir" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Excluir Local
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
					<?php echo form_open('locais/excluir'); ?>
						<div class="modal-body">
							<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
								<div class="m-alert__icon">
									<i class="la la-trash"></i>
									<span></span>
								</div>
								<div class="m-alert__text">
									Tem certeza que deseja excluir este local?
								</div>
							</div>
							<input type="hidden" name="idPost" class="i_modal_excluir" value="" />
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Cancelar
							</button>
							<button type="submit" class="btn btn-secondary">
								Confirmar
							</button>
						</div>
					</form>
                </div>
            </div>
        </div>
        <!--Modal::Excluir-->
        <?php
        break;
    case 'cadastrar':
        ?>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title">
                        Locais
                    </h3>
                </div>
            </div>
        </div>
        <?php
        erros_validacao();
        get_msg('msgok');
        get_msg('msgerro');
        ?>
		<div class="m-content">
			<div class="">
                <div class="m-portlet m-portlet--tabs">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class="fa fa-plus m--margin-right-5"></i> Cadastrar Local
                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('locais/cadastrar', array('class' => 'm-form m-form--label-align-left- m-form--state-','id' => 'm_form')); ?>
					<!--begin: Form Body -->
					<div class="m-portlet__body">
						<div class="row">
							<div class="col-xl-8 offset-xl-2">
								<div class="m-form__section m-form__section--first">
									<div class="m-form__heading">
										<h3 class="m-form__heading-title">
											Detalhes do Local
										</h3>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Nome:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" name="nome" class="form-control m-input" placeholder="" value="<?php echo set_value('nome') ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* CEP:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="cep" value="<?= set_value('cep'); ?>" id="cep_inputmask" onblur="javascript:findCEP();">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Logradouro:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="logradouro" id="logradouro" value="<?= set_value('logradouro'); ?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Numero:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="numero" id="numero" value="<?= set_value('numero'); ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Complemento:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="complemento" value="<?= set_value('complemento'); ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Bairro:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="bairro" id="bairro" value="<?= set_value('bairro'); ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* UF:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="uf" id="uf" value="<?= set_value('uf'); ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Cidade:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="cidade" id="cidade" value="<?= set_value('cidade'); ?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Data:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
										<input type="date" name="data" class="form-control m-input" placeholder="" value="<?php echo set_value('data') ?>" required="required">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<ul class="m-nav-sticky" style="margin-top: 30px;">
						<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Salvar" data-placement="left">
							<button type="submit" id="Salvar" class="m-portlet__nav-link btn btn-lg m-btn botoes m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
								<i class="fa fa-check"></i>
							</button>
						</li>
						<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Cancelar" data-placement="left">
							<a href="<?php echo base_url('locais/gerenciar') ?>" class="m-portlet__nav-link btn btn-lg m-btn btn-danger m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
								<i class="fa fa-close"></i>
							</a>
						</li>
					</ul>
					</form>
                </div>
            </div>
        </div>
		<?php
        break;
    case 'editar':
		$idPost = $this->uri->segment(3);
        if ($idPost == null or $idPost == '') {
            set_msg('msgerro', 'Local não encontrado', 'erro');
            redirect('locais/gerenciar');
        }
        $local = $this->locais->get_byid($idPost)->row();
        ?>
        <div class="m-subheader">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title">
                        Locais
                    </h3>
                </div>
            </div>
        </div>
        <?php
        erros_validacao();
        get_msg('msgok');
        get_msg('msgerro');
        ?>
		<div class="m-content">
			<div class="">
                <div class="m-portlet m-portlet--tabs">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class="fa fa-pencil m--margin-right-5"></i> Editar Local
                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('locais/editar/'.$idPost, array('class' => 'm-form m-form--label-align-left- m-form--state-','id' => 'm_form')); ?>
					<input type="hidden" name="hdIdLocal" value="<?php echo $idPost ?>" />
					<!--begin: Form Body -->
					<div class="m-portlet__body">
						<div class="row">
							<div class="col-xl-8 offset-xl-2">
								<div class="m-form__section m-form__section--first">
									<div class="m-form__heading">
										<h3 class="m-form__heading-title">
											Detalhes do Local
										</h3>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Nome:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" name="nome" class="form-control m-input" placeholder="" value="<?php echo $local->nome ?>" required="required">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* CEP:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="cep" value="<?php echo $local->cep ?>" id="cep_inputmask" onblur="javascript:findCEP();">

										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Logradouro:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $local->logradouro ?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Numero:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="numero" id="numero" value="<?php echo $local->numero ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Complemento:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="complemento" value="<?php echo $local->complemento ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Bairro:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $local->bairro ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* UF:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="uf" id="uf" value="<?php echo $local->uf ?>">	
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Cidade:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
											<input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $local->cidade ?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12">
											* Data:
										</label>
										<div class="col-lg-8 col-md-8 col-sm-12">
										<input type="date" name="data" class="form-control m-input" placeholder="" value="<?php echo $local->data ?>" required="required">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<ul class="m-nav-sticky" style="margin-top: 30px;">
						<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Salvar" data-placement="left">
							<button type="submit" id="Salvar" class="m-portlet__nav-link btn btn-lg m-btn botoes m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
								<i class="fa fa-check"></i>
							</button>
						</li>
						<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Cancelar" data-placement="left">
							<a href="<?php echo base_url('locais/gerenciar') ?>" class="m-portlet__nav-link btn btn-lg m-btn btn-danger m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
								<i class="fa fa-close"></i>
							</a>
						</li>
					</ul>
					</form>
                </div>
            </div>
        </div>
		<?php
        break;
    case 'ativar':
        ?>
		<?php
        break;
    case 'desativar':
        ?>
		<?php
        break;
    case 'excluir':
        ?>
        <?php
        break;
    default:
        echo '<div class="alert alert-error">
				  <button type="button" class="close" data-dismiss="alert">x</button>
				  <strong>Opss!</strong> Desculpe, a tela solicitada não existe.
			  </div>';
        break;
endswitch;