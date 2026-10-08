<footer>
	<div class="container">
		<div class="footer-section">
			<div class="footer-list">
				<h3>Бренды</h3>
				<ul id="brand-list">
					<?php
						$q_phbrands = DBQuery(" SELECT `brand` FROM `products` GROUP BY `brand` ");
						while( $phbrand_arr = mysqli_fetch_assoc($q_phbrands) ) {
							echo '<li>' . $phbrand_arr['brand'] . '</li>';
						}
					?>
				</ul>
			</div>
			<div style="display: flex; align-items: center; gap: 5px;">
			<?php
				echo '<span>2024 - ' . date('Y') . '</span>
				<img class="footer-icons" src="' . URL_ICONS . 'copyright_icon_vector.png" alt="">'
			?>
			</div>
		</div>
		<div class="footer-section">
			<div class="footer-list">
				<h3>Контакты</h3>
				<ul id="contacts-list">
					<?php
					echo '<li>
						<img class="footer-icons" src="' . URL_ICONS . 'phone_icon_white.png" alt="">
						0552123355
					</li>
					<li>
						<img class="footer-icons" src="' . URL_ICONS . 'email_icon_white.png" alt="">
						shop@gmail.com
					</li>
					<li>
						<img class="footer-icons" src="' . URL_ICONS . 'address_icon_white.png" alt="">
                    	г. Бишкек, ул. Юнусалиева 87, цокольный этаж
					</li>'
					?>
				</ul>
			</div>
				<div>
					<p>Разработано: Никитой Камышенцевым</p>
				</div>
		</div>
	</div>
</footer>
	

<script src="<?= URL_JS ?>cart.js"></script>
<script>
	if (el("#contact-form")) {
		el("#contact-form").addEventListener('submit', function (e) {
			e.preventDefault();
			let xhr = new XMLHttpRequest();
			let formdata = new FormData(this);
			xhr.open('post', urlRoot + '/controllers/c_contact.php');
			xhr.send(formdata);

			xhr.onload = function (ev) {
				C.log(xhr.response);
				if (xhr.status = 200) {
					C.log(this);
					el("#contact-form").innerHTML = 'Форма успешно отправлена и получена ';
				}
			}
		});
	}
</script>