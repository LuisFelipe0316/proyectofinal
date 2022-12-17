<?php

	$objconduce = new conduce();
	$Count_verconduce = $objconduce->Count_verconduce('','');

	foreach ($Count_verconduce as $row => $column) {
		$total_verconduce = $column["total_verconduce"];
	}


 ?>

			<!-- Labels -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-flat">
						<div class="breadcrumb-line">
							<ul class="breadcrumb">
								<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
								<li><a href="javascript:;"> Conduce De Mercancia</a></li>
								<li class="active">Ver Conduce</li>
							</ul>
						</div>
						<div class="panel-heading">
							<div class="row">
								<div class="col-sm-6 col-md-5">
								 <form role="form" autocomplete="off" class="form-validate-jquery" id="frmSearch">
									 <div class="form-group">
										 <div class="row">
											 <div class="col-sm-5">
												 <div class="input-group">
												 <span class="input-group-addon"><i class="icon-calendar3"></i></span>
												 <input type="text" id="txtF1" name="txtF1" placeholder=""
													class="form-control input-sm" style="text-transform:uppercase;"
																 onkeyup="javascript:this.value=this.value.toUpperCase();">
																 </div>
											 </div>
											 <div class="col-sm-5">
												 <div class="input-group">
												 <span class="input-group-addon"><i class="icon-calendar3"></i></span>
												 <input type="text" id="txtF2" name="txtF2" placeholder=""
													class="form-control input-sm" style="text-transform:uppercase;"
																 onkeyup="javascript:this.value=this.value.toUpperCase();">
																 </div>
											 </div>
											 <div class="col-sm-2">
												 <button style="margin-top: 0px;" id="btnGuardar"
												 type="submit" class="btn btn-primary btn-sm">
												 <i class="icon-search4"></i> Consultar</button>
											 </div>
										 </div>
									 </div>
									 </form>
									 </div>
							 </div>
						</div>

					<div id="reload-div">
						<div class="panel-body">
							<div class="tabbable">
								<ul class="nav nav-tabs nav-tabs-highlight">
									<li class="active"><a href="#label-tab1" data-toggle="tab">CONDUCE REALIZADAS <span id="span-ing" class="label
									label-success position-right"><?php echo $total_verconduce ?></span></a></li>
								</ul>

								<div class="tab-content">

									<div class="tab-pane active" id="label-tab1">
										<!-- Basic initialization -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h5 class="panel-title">Conduce </h5>
												<div class="heading-elements">

												</div>
											</div>
												<div class="panel-body">
													<table class="table datatable-basic table-xs table-hover">
														<thead>
															<tr>
																<th>Fecha</th>
																<th>Numero</th>
																<th>A Nombre De</th>
																<th>Tipo Pago</th>
																<th>Entrega</th>
																<th>Total</th>
																<th>Opciones</th>
															</tr>
														</thead>

														<tbody>

														  <?php
																$filas = $objconduce->Listar_verconduce('','');
																if (is_array($filas) || is_object($filas))
																{
																foreach ($filas as $row => $column)
																{

																	$fecha_conduce = $column["fecha_conduce"];
																	if(is_null($fecha_conduce))
																	{
																		$c_fecha_conduce = '';

																	} else {

																		$c_fecha_conduce = DateTime::createFromFormat('Y-m-d H:i:s',$fecha_conduce)->format('d/m/Y H:i:s');
																	}

																?>
																	<tr>
																		  <td><?php print($c_fecha_conduce); ?></td>
																			<td><?php print($column['numero_conduce']); ?></td>
										                	<td><?php print($column['a_nombre']); ?></td>
										                	<td><?php print($column['tipo_pago']); ?></td>
																			<td><?php print($column['entrega']); ?></td>
																			<td><?php print($column['total']); ?></td>


																		<td class="text-center">
																			<ul class="icons-list">
																				<li class="dropdown">
																					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																						<i class="icon-menu9"></i>
																					</a>
																					<ul class="dropdown-menu dropdown-menu-right">
																						 <li><a id="detail_pay"  data-toggle="modal"
																							data-target="#modal_detalle" data-toggle="modal" data-target="#modal_detalle"
																						   data-id="<?php print($column['idconduce']); ?>"
																							href="javascript:void(0)">
																						   <i class="icon-file-spreadsheet">
																					     </i> Ver Detalle</a>
																						 </li>

																							 <li><a id="print_invoice"
																							data-id="<?php print($column['idconduce']); ?>"
																							href="javascript:void(0)">
																						 	<i class="icon-printer2">
																							</i> Imprimir</a></li>

																							<li><a id="cobrar"
																							data-id="<?php print($column['idconduce']); ?>"
																							href="?View=POS">
																							<i class="icon-cash">
																							</i> Cobrar</a></li>

																							<li><a id="delete_product"
																							data-id="<?php print($column['idconduce']); ?>"
																							href="javascript:void(0)">
																							<i class=" icon-trash">
																							</i> Borrar</a></li>

																					</ul>
																				</li>
																			</ul>
																		</td>
													        </tr>
																<?php
																		}
																	}
																?>
															</tbody>
													</table>
												</div>
											</div>
									</div>


								</div>
							</div>
						</div>
					</div>



			</div>
		</div>
	</div>
	<!-- /labels -->


<!-- Iconified modal -->
	<div id="modal_detalle" class="modal fade">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title"></i> &nbsp; <span class="title-form text-uppercase">Detalle de Conduce</span></h5>
				</div>

		        <form role="form" autocomplete="off" class="form-validate-jquery" id="frmModal">
					<div class="modal-body" id="modal-container">

					<div id="reload-detalle">
							<!-- Collapsible with right control button -->
							<div class="panel-group panel-group-control panel-group-control-right content-group-lg">
								<div class="panel">
									<div class="panel-heading bg-info">
										<h6 class="panel-title">
											<a class="collapsed" data-toggle="collapse" href="#collapsible-control-right-group2">Clic para ver Información deL Conduce</a>
										</h6>
									</div>
									<div id="collapsible-control-right-group2" class="panel-collapse collapse">
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table table-xxs table-bordered">
												 <tbody class="border-solid">
												 <tr>
												 	<td width="5%" class="text-bold text-left">NO. CONDUCE</td>
													<td width="35%"></td>
													<td width="2%" class="text-bold text-left">FORMA PAGO</td>
													<td width="30%"></td>
												 </tr>
												<tr>
													<td width="5%" class="text-bold text-left">A NOMBRE DE </td>
													<td width="30%"></td>
													<td width="2%" class="text-bold text-left">FECHA</td>
													<td width="30%"></td>
												</tr>
												<tr>
													<td width="20%" class="text-bold text-left">FORMA DE ENTREGA</td>
													<td width="5%"></td>
													<td width="10%" class="text-bold text-left">TOTAL</td>
													<td width="5%"></td>
												</tr>
												</tbody>
											</table>
										 </div>
										</div>
									</div>
								</div>
							</div>
							<!-- /collapsible with right control button -->

							<div class="panel-group panel-group-control panel-group-control-right content-group-lg">
								<div class="table-responsive">
									<table id="tbldetalle" class="table table-borderless table-striped table-xxs">
										<thead>
											<tr class="bg-blue">
												<th>Producto</th>
												<th>Cant.</th>
												<th>Precio</th>
												<th>Tot. SIN ITEBIS</th>
												<th>Descuento</th>
												<th>Importe</th>
												<th>Disponible</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
										<tfoot>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td width="10%">SUMAS</td>
												<td id="sumas"></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td width="10%">ITEBIS </td>
												<td id="iva"></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td width="10%">SUBTOTAL</td>
												<td id="subtotal"></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td width="10%">RET. (-)</td>
												<td id="ivaretenido"></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td width="10%">TOT. SIN ITEBIS</td>
												<td id="exentas"></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td width="10%">DESCUENTO</td>
												<td id="descuentos"></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td width="10%">TOTAL</td>
												<td id="total"></td>
												<td></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>

						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /iconified modal -->

	<script type="text/javascript" src="web/custom-js/verconduce.js"></script>
