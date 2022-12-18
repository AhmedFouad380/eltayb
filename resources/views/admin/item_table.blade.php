
<tr class="">
    <td scope="row">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-model" data-bs-toggle="modal" data-bs-target="#exampleModal">
            proudact name
            <i class=" baby-blue fa-solid fa-circle-info"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td>
        <!-- this is Quantity -->
        <div class="qty-input d-flex">
            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
            <input class="product-qty form-control" type="number" name="product-qty" min="0" value="1">
            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
        </div>
        <!-- end Quantity -->
        <div class="mt-3">
            <select name="" id="" class="selc">
                <option value="volvo">prices</option>
                <option value="saab">Saab</option>
            </select>
        </div>
    </td>
    <td>
        <input type="text" class="form-control price">
    </td>
    <td class="sub-total">
        $1235
    </td>
    <td>
        <i class="mt-3 red close fa-solid fa-xmark"></i>
    </td>
</tr>
