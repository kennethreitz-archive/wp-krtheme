<footer class="pageFooter">
	<div class="lf w6c">
		<div class="lu w2c first-child">
			<h3>SEARCH</h3>
			<?php get_search_form(); ?>
		<!--/.lu .w2c--></div>
		<div class="lu w1c vcard">
			<h3><?php echo ia3_get_layout_text('ia3_contact_t1', FALSE, 'CONTACT'); ?></h3>
			<span class="fn"><?php echo ia3_get_layout_text('ia3_contact_11', FALSE, 'XXXXXX'); ?></span><br />
			<span class="tel"><?php echo ia3_get_layout_text('ia3_contact_12', FALSE, '+00-0-0000-0000'); ?></span><br />
			<?php echo ia3_get_layout_text('ia3_contact_13', TRUE, '<a class="url" href="">Link</a>'); ?>
		<!--/.lu .w1c--></div>
		<div class="lu w1c vcard">
			<h3><?php echo ia3_get_layout_text('ia3_contact_t2', FALSE, 'CONTACT'); ?></h3>
			<span class="fn"><?php echo ia3_get_layout_text('ia3_contact_21', FALSE, 'XXXXXX'); ?></span><br />
			<span class="tel"><?php echo ia3_get_layout_text('ia3_contact_22', FALSE, '+00-0-0000-0000'); ?></span><br />
			<?php echo ia3_get_layout_text('ia3_contact_23', TRUE, '<a class="url" href="">Link</a>'); ?>
		<!--/.lu .w1c--></div>
		<div class="lu w1c vcard">
			<h3><?php echo ia3_get_layout_text('ia3_contact_t3', FALSE, 'CONTACT'); ?></h3>
			<span class="fn"><?php echo ia3_get_layout_text('ia3_contact_31', FALSE, 'XXXXXX'); ?></span><br />
			<span class="tel"><?php echo ia3_get_layout_text('ia3_contact_32', FALSE, '+00-0-0000-0000'); ?></span><br />
			<?php echo ia3_get_layout_text('ia3_contact_33', TRUE, '<a class="url" href="">Link</a>'); ?>
		<!--/.lu .w1c--></div>
		<div class="lu w1c">
				<h3><?php echo ia3_get_layout_text('ia3_contact_t4', FALSE, 'CONTACT'); ?></h3>
				<span class="fn"><?php echo ia3_get_layout_text('ia3_contact_41', FALSE, 'XXXXXX'); ?></span><br />
				<span class="tel"><?php echo ia3_get_layout_text('ia3_contact_42', FALSE, '+00-0-0000-0000'); ?></span><br />
				<?php echo ia3_get_layout_text('ia3_contact_43', TRUE, '<a class="url" href="">Link</a>'); ?>
			</ul>
		<!--/.lu .w1p--></div>
	<!--/.lf .w6c--></div>
	<div class="footerBottom">
		<nav class="footerNav">
			<ul>
				<li><a href="<?php bloginfo('siteurl'); ?>/">HOME</a></li>
				<li><?php echo ia3_get_layout_select('ia3_footer_1'); ?></li>
				<li><?php echo ia3_get_layout_select('ia3_footer_2'); ?></li>
				<li><?php echo ia3_get_layout_select('ia3_footer_3'); ?></li>
				<li><?php echo ia3_get_layout_select('ia3_footer_4'); ?></li>
			</ul>
		</nav>
		<div class="copyright">&copy;  Kenneth Reitz</div>
	<!-- /.footerBottom --></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>