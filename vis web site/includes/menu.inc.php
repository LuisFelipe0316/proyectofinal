					<li class="active"><a href="./?View=Inicio"><i class="icon-home4"></i> <span>Inicio</span></a></li>

					<?php  if($tipo_usuario == '1'){ ?>
						<!-- MAESTROS -->
						<li>
							<a href="#"><i class="icon-box"></i> <span>MAESTROS</span></a>
							<ul>
							<li><a href="./?View=Producto">Productos</a></li>
								<li><a href="./?View=Categoria">Tipo de Articulos</a></li>
								<li><a href="./?View=Presentacion">Conversión D. Articulos</a></li>
								<li><a href="./?View=Marca">Marca</a></li>
								<li><a href="./?View=Clientes">Maestro Clientes</a></li>
								
								<li><a href="./?View=Perecederos">Productos F. Vencimiento</a></li>
							</ul>
						</li>
						<!-- /MAESTROS -->

						<!-- Inventario -->
						<li>
							<a href="#"><i class="icon-grid6"></i> <span>Inventario</span></a>
							<ul>
								<li><a href="./?View=Abrir-Inventario">Abrir Nuevo Inventario</a></li>
								<li><a href="./?View=Kardex">Mov. Inventario</a></li>
							</ul>
						</li>
						<!-- /Inventario -->

						<!-- CIERRE DE CAJA -->
						<li>
							<a href="#"><i class="icon-cash3"></i> <span>CIERRE DE CAJA</span></a>
							<ul>
								<li><a href="./?View=Caja">Administrar Caja</a></li>
								<li><a href="./?View=Historico-Caja">Historial de Caja</a></li>
							</ul>
						</li>
						<!-- /CIERRE DE CAJA -->

						<!-- FACTURACIÓN -->
						<li>
							<a href="#"><i class="icon-cart"></i> <span>FACTURACIÓN</span></a>
							<ul>
								<li><a href="./?View=POS">Ventas Directa</a></li>
								<li><a href="./?View=Apartados-Diarios">Facturar Preventa</a></li>
								<li><a href="./?View=Venta-Diaria">Consultar Ventas del Dia</a></li>
								<li><a href="./?View=Ventas-Fecha">Consultar Ventas por Fecha</a></li>
								<li><a href="./?View=Ventas-Mes">Consultar Ventas por Mes</a></li>
							</ul>
						</li>
						<!-- /FACTURACIÓN -->

						<!-- Cotizaciones -->
						<li>
							<a href="#"><i class="icon-file-spreadsheet"></i> <span>COTIZACIONES</span></a>
							<ul>
								<li><a href="./?View=Cotizacion">Generar Cotizacion</a></li>
								<li><a href="./?View=Cotizaciones">Ver Cotizaciones</a></li>
							</ul>
						</li>
						<!-- /Cotizaciones -->


						<!-- Compras -->
						<li>
							<a href="#"><i class="icon-truck"></i> <span>COMPRAS</span></a>
							<ul>
								<li><a href="./?View=Compras">Realizar Compras</a></li>
								<li><a href="./?View=Proveedor">Proveedores</a></li>
								<li><a href="./?View=Compras-Fecha">Consultar Compras por Fecha</a></li>
								<li><a href="./?View=Compras-Mes">Consultar Compras por Mes</a></li>
								<li><a href="./?View=Historico-Precios">Historial de Precios</a></li>
							</ul>
						</li>
						<!-- /Compras -->
					
						<!-- APARTADO DE ARTICULOS -->
						<li>
							<a href="#"><i class="icon-price-tags2"></i> <span>PREVENTA DE ARTICULOS</span></a>
							<ul>
								<li><a href="./?View=POS-A">Preventa Productos</a></li>
								<li><a href="./?View=Apartados-Fecha">Consultar Preventa por Fecha</a></li>
								<li><a href="./?View=Apartados-Mes">Consultar Preventa por Mes</a></li>
							</ul>
						</li>
						<!-- /APARTADO DE ARTICULOS -->

						<!-- Creditos -->
						<li>
							<a href="#"><i class="icon-coins"></i> <span>VENTAS A. CREDITOS</span></a>
							<ul>
								<li><a href="./?View=Creditos">Administrar Creditos</a></li>
							</ul>
						</li>
						<!-- /Creditos -->

					<!-- Conduce -->
					<li>
							<a href="#"><i class="icon-truck"></i> <span>CONDUCE DE MERCANCIAS</span></a>
							<ul>
								<li><a href="./?View=conduce">Generar Conduce</a></li>
								<li><a href="./?View=verconduce">Ver Conduce</a></li>
							</ul>
						</li>
						<!-- /Conduce -->

						<!-- Taller  --->
						<li>
							<a href="#"><i class="icon-hammer-wrench"></i> <span>Orden. Taller</span></a>
							<ul>
								<li><a href="./?View=Taller">Orden de Taller</a></li>
								<li><a href="./?View=Tecnicos">Tecnicos</a></li>
							</ul>
						</li>
						<!-- Taller --->

						<!-- Documentos -->
						<li>
							<a href="#"><i class="icon-certificate"></i><span>OTROS</span></a>
							<ul>
								<li><a href="./?View=Tipo-Comprobante">Tipo de Comprobante</a></li>
								<li><a href="./?View=Tirajes">Registro de Comprobantes</a></li>
							</ul>
						</li>
						<!-- /Documentos -->



						<!-- Usuarios -->
						<li>
							<a href="#"><i class="icon-users"></i> <span>USUARIOS</span></a>
							<ul>
								<li><a href="./?View=Empleados">Empleados</a></li>
								<li><a href="./?View=Usuario">Usuario</a></li>

							</ul>
						</li>
						<!-- /Usuarios -->

						<!-- Ajustes -->
						<li>
							<a href="#"><i class="icon-cog2"></i> <span>PARAMETROS</span></a>
							<ul>
                                <li><a href="./?View=Monedas">Monedas</a></li>
								<li><a href="./?View=Parametros">Datos de la empresa</a></li>
								<li><a href="./?View=Empresa">Empresa</a></li>

							</ul>
						</li>

						<!-- /Ajustes -->

						<!-- /Acera de -->
						<li>
							<a href="./?View=Acerca-de"><i class="icon-info22"></i> <span>ACERCA D. </span></a>
						</li>
						<!--Acerca de  -->

					<?php } else { ?>


						<!-- MAESTROS -->
						<li>
							<a href="#"><i class="icon-box"></i> <span>MAESTROS</span></a>
							<ul>
								<li><a href="./?View=Producto">Producto</a></li>
							</ul>
						</li>
						<!-- /MAESTROS -->

						<!-- Inventario -->
					
						<!-- /Inventario -->

						<!-- CIERRE DE CAJA -->
						<li>
							<a href="#"><i class="icon-cash3"></i> <span>CIERRE DE CAJA</span></a>
							<ul>
								<li><a href="./?View=Caja">Administrar Caja</a></li>
							</ul>
						</li>
						<!-- /CIERRE DE CAJA -->

						<!-- FACTURACION -->
						<li>
							<a href="#"><i class="icon-cart"></i> <span>FACTURACIÓN</span></a>
							<ul>
								<li><a href="./?View=POS">Proceso D. Venta</a></li>
								<li><a href="./?View=Clientes">Clientes</a></li>
							</ul>
						</li>
						<!-- /FACTURACION -->

						<!-- Cotizaciones -->
					
						<!-- /Cotizaciones -->
				
						<!-- Creditos -->
						<li>
							<a href="#"><i class="icon-coins"></i> <span>Ventas al Credito</span></a>
							<ul>
								<li><a href="./?View=Creditos">Administrar Creditos</a></li>
							</ul>
						</li>
						<!-- /Creditos -->

						<!-- /Acera de -->
						<li>
							<a href="./?View=Acerca-de"><i class="icon-info22"></i> <span>ACERCA D. </span></a>
						</li>
						<!--Acerca de  -->



					<?php } ?> 
					
					
