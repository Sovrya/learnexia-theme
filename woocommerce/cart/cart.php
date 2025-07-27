<?php defined( 'ABSPATH' ) || exit; ?>

<?php do_action( 'woocommerce_before_cart' ); ?>

<div class="cart-container">
    <h1 class="cart-title">🛒 Sepetim</h1>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

        <table class="shop_table shop_table_responsive cart">
            <thead>
                <tr>
                    <th>Ürün</th>
                    <th>Fiyat</th>
                    <th>Adet</th>
                    <th>Toplam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                    $_product   = $cart_item['data'];
                    $product_id = $cart_item['product_id'];
                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                        $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
                ?>
                <tr>
                    <td class="product-name">
                        <div class="cart-product-wrapper">
                            <div class="cart-thumb"><?php echo $_product->get_image( 'thumbnail' ); ?></div>
                            <div class="cart-title">
                                <?php echo $product_permalink ? '<a href="' . esc_url( $product_permalink ) . '">' . $_product->get_name() . '</a>' : $_product->get_name(); ?>
                            </div>
                        </div>
                    </td>
                    <td><?php echo wc_price( $_product->get_price() ); ?></td>
                    <td>
                        <?php
                            woocommerce_quantity_input([
                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                'input_value' => $cart_item['quantity'],
                                'min_value'   => '0',
                                'max_value'   => $_product->get_max_purchase_quantity(),
                            ], $_product, false );
                            ?>
                    </td>
                    <td><?php echo WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ); ?></td>
                    <td>
                        <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>"
                            class="remove">❌</a>
                    </td>
                </tr>
                <?php endif; endforeach; ?>
                <?php do_action( 'woocommerce_cart_contents' ); ?>
            </tbody>
        </table>

        <div class="cart-actions">
            <button type="submit" class="button" name="update_cart">Sepeti Güncelle</button>
            <?php do_action( 'woocommerce_cart_actions' ); ?>
            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
        </div>
    </form>

    <div class="cart-totals">
        <?php do_action( 'woocommerce_cart_collaterals' ); ?>
    </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>