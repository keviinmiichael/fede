<tr>
    <td>
        <label class="input"><input name="code[]" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input name="name[]" type="text" value="" /></label>
    </td>
    <td>
        <label class="input"><input name="price[]" type="text" value="" class="price" data-type="float" /></label>
    </td>
    <td>
        <label class="input"><input name="amount[]" type="text" value="" class="amount" data-type="float" /></label>
    </td>
    <td>
        <label class="input"><input class="price" name="total[]" type="text" value="" data-type="float" readonly /></label>
        <input type="hidden" name="product_id[]" value="" />
    </td>
    <td><a class="btn btn-danger" style="padding: 5px 10px" onclick="Purchase.removeRow(this)"><i class="fa fa-trash-o"></i></a></td>
</tr>