@extends('app')




@section('content')
<div class="container">
    <h2>Updates a pet in the store with form data</h2>
    <form id="saveInfo" method="post">
        <div class="row">
            @csrf
            <div class="col-md-3">
                <div class="form-group">
                    <label for="id">ID of pet that needs to be updated:</label>
                    <input type="number" class="form-control" name="id" min="1" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Updated name of the pet:</label>
                    <input type="text" class="form-control" name="name" >
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="status">Updated status of the pet:</label>
                    <select name="status" class="form-control" required>
                        <option value="available">Available</option>
                        <option value="pending">Pending</option>
                        <option value="sold">Sold</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="tags_id">&nbsp; &nbsp;</label>
                    <button type="submit" id="submit" class="btn btn-success" style="width: 100%">Save</button>
                </div>
            </div>
        </div>
    </form>
    <br/>
    <h3>Output:</h3>
    <div id="item-list">

    </div>

</div>

<script>
    $(document).on('submit', '#saveInfo', function (e) {

        var formData = new FormData($("#saveInfo")[0]);
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: base_url + '/pet/updateByFormData',
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                $('#item-list').html('<div class="alert alert-success" role="alert">Update Success!!</div>');
            },
            error: function(xhr,err){
                $('#item-list').html('<div class="alert alert-danger" role="alert">Data not found!!</div>');
            }
        });
    });

</script>
@endsection