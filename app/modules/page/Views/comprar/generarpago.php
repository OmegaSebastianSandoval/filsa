<form action="https://checkout.wompi.co/p/" method="GET" id="form-checkout">

    <input type="hidden" name="public-key" value="<?= $this->publicKey ?>" />
    <input type="hidden" name="currency" value="<?= $this->moneda ?>" />
    <input type="hidden" name="amount-in-cents" value="<?= intval($this->pedido->pedido_total * 100) ?>" />
    <input type="hidden" name="reference" value="<?= $this->pedido->pedido_id ?>" />
    <input type="hidden" name="signature:integrity" value="<?= $this->cadenaHash ?>" />



    <input type="hidden" name="redirect-url" value="http://localhost:8043/page/comprar/respuesta" />
    <!-- <?= $this->redirectUrl ?> -->
    <input type="hidden" name="expiration-time" value="<?= $this->fechaExpiracion ?>" />
    <input type="hidden" name="tax-in-cents:vat" value="<?= intval($this->pedido->pedido_iva * 100)  ?>" />

    <input type="hidden" name="customer-data:email" value="<?= $this->pedido->pedido_correo ?>" />
    <input
        type="hidden"
        name="customer-data:full-name"
        value="<?= $this->pedido->pedido_nombre ?>" />
    <input
        type="hidden"
        name="customer-data:phone-number"
        value="<?= "+57" . $this->pedido->pedido_telefono ?>" />
    <input
        type="hidden"
        name="customer-data:legal-id"
        value="<?= $this->pedido->pedido_documento ?>" />
    <input
        type="hidden"
        name="customer-data:legal-id-type"
        value="<?= $this->pedido->pedido_tipo_documento ?>" />
    <input
        type="hidden"
        name="shipping-address:address-line-1"
        value="<?= mb_convert_encoding($this->pedido->departamento_nombre, 'ISO-8859-1', 'UTF-8')  . ", " .  mb_convert_encoding($this->pedido->ciudad_nombre, 'ISO-8859-1', 'UTF-8') . ", " . $this->pedido->pedido_direccion ?>" />
    <input type="hidden" name="shipping-address:country" value="<?= $this->pedido->pedido_pais ?>" />
    <input
        type="hidden"
        name="shipping-address:phone-number"
        value="<?= $this->pedido->pedido_telefono ?>" />
    <input type="hidden" name="shipping-address:city" value="<?=  mb_convert_encoding($this->pedido->ciudad_nombre, 'ISO-8859-1', 'UTF-8') ?>" />
    <input type="hidden" name="shipping-address:region" value="<?=  mb_convert_encoding($this->pedido->departamento_nombre, 'ISO-8859-1', 'UTF-8') ?>" />
    <button type="submit" style="visibility:hidden">Pagar con Wompi</button>
</form>

<script>
    document.getElementById("form-checkout").submit();
</script>