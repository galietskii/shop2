<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
if (is_active_sidebar('woocommerce_sidebar')) {
    dynamic_sidebar('woocommerce_sidebar');
}
?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>