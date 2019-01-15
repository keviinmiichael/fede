<tr>
    <td>
        <label class="input"><input name="code[]" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input name="name[]" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input name="cost[]" type="text" value="" class="cost" data-type="float" /></label>
    </td>
    <td>
        <select class="form-control" name="price_format[]" style="min-width: 100px">
            <option value="1">Margen</option>
            <option value="2">Precio fijo</option>
        </select>
    </td>
    <td>
        <label class="input"><input name="profit_margin[]" type="text" value="" data-type="float" /></label>
    </td>
    <td>
        <label class="input"><input class="price" name="price[]" type="text" value="" data-type="float" readonly /></label>
        <input type="hidden" name="product_id[]" value="" />
    </td>
    <td><a class="btn btn-danger" style="padding: 5px 10px" onclick="Prices.removeRow(this)"><i class="fa fa-trash-o"></i></a></td>
</tr>