<?php ?>
<div class="pan">
	<span class="panProductsCount"><span class="textcount"></span></span>
</div>
	<div class="pan-sidebar col-lg-3 col-md-3 col-sm-12">
	<?php if ( is_active_sidebar( 'woo-sidebar' ) ) : ?>
		<div class="sidebar">
			<span class="close-sidebar">
				<span></span>
				<span></span>
			</span>
			<?php dynamic_sidebar( 'woo-sidebar' ); ?>
		</div>
<?php endif; ?>
</div>
</div>


<script type="text/javascript">
let textCount = document.querySelector('.textcount');
let addedCard = document.querySelectorAll('.added_to_cart');
textCount.innerHTML += 0

let pan  = document.querySelector('.pan');
let panSidebar  = document.querySelector('.pan-sidebar');
pan.addEventListener('click', () => {
	panSidebar.style.visibility = "visible";
})
document.querySelector('.close-sidebar').addEventListener('click', () => {
	panSidebar.style.visibility = "hidden";
})
let sideBarQuantity = document.querySelector('.product_list_widget')
let quantity = document.querySelectorAll('.quantity')
sideBarQuantity.addEventListener('change', () => {
	quantity.forEach(element => {
		console.log(element.text);
	});
})
</script>
<!-- #content -->