<?php defined('_JEXEC') or die('Restricted access');

$selectedProduct = new Product($this->product->virtuemart_product_id);
$categories = $selectedProduct->getCategories();
$categories = Categories::all($categories[0]->parentId());

$contentWidth = 920;
$paddingWidth = (2 * (1 + 10)) * count($categories);
$marginWidth = 20 * (count($categories) - 1);
$categoryWidth = floor(($contentWidth - $paddingWidth - $marginWidth) / count($categories));

$categoryStyle = sprintf("width: %dpx;", $categoryWidth); ?>

<?php foreach ($categories as $categoryNumber => $category): ?>

	<ul style="<?php echo $categoryStyle ?>">

		<?php $products = Products::all($category->categoryId());

		$productsPerRow = $category->productsPerRow();
		if (!$productsPerRow)
			$productsPerRow = count($products);

		$paddingWidth = 2 * (1 + 5);
		$productWidth = floor(($categoryWidth - $paddingWidth * $productsPerRow) / $productsPerRow);

		$productStyle = sprintf("width: %dpx;", $productWidth);

		foreach ($products as $productNumber => $product):
			$cloud = new ShopCloud($product);


			$class = ($product->productId() == $selectedProduct->productId()) ? 'selected' : 'not_selected'; ?>

			<li class="<?php echo $class ?>" style="<?php echo $productStyle ?>">
				<a href="index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=<?php echo $product->productId() ?>">
					<p> <?php echo $product->productName() ?> </p>
				</a>
			</li>

		<?php endforeach ?>

	</ul>

	<?php if ($categoryNumber == 0) $categoryStyle .= " margin-left: 20px;" ?>

<?php endforeach ?>
