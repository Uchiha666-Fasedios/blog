<?php //esta vista viene del controlador CategoriaController y trae la categoria y los prroductos de esa categoria
 if (isset($categoria)): //si existe categoria q me trae el nombre de la categoria?>
	<h1><?= $categoria->nombre ?></h1><?php //muestro el nombre de la categoria?>
	<?php if ($productos->num_rows == 0): // si no tiene productos?>
		<p>No hay productos para mostrar</p>
	<?php else: //si no tiro el while con los productos?>

		<?php while ($product = $productos->fetch_object()): //paso el objeto como array para asi mostrarlos?>
			<div class="product">
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>"><?php //aca si toco me muestra el detalle ?>
					<?php if ($product->imagen != null): //si ay imagen la muestro?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" /><?php //imagen por default ?>
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>
				<p><?= $product->precio ?></p>
				<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
			</div>
		<?php endwhile; ?>

	<?php endif; ?>
<?php else: ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>
