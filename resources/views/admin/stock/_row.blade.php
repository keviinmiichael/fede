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
        <label class="input"><input name="amount[]" type="text" value="" data-type="int" /></label>
    </td>
    <td>
        <a class="btn btn-danger" style="padding: 5px 10px" onclick="Stock.removeRow(this)">
            <i class="fa fa-trash-o"></i>
        </a>
        <input type="hidden" name="product_id[]" value="0" />
    </td>
</tr>