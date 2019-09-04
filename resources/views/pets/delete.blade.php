@extends('app')




@section('content')
<div class="container">
    <h2>Delete an existing pet</h2>
    <form id="saveInfo" method="post">
        <div class="row">
            @csrf
            <div class="col-md-3">
                <div class="form-group">
                    <label for="api_key">api_key:</label>
                    <input type="text" class="form-control" name="api_key" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="id">petId:</label>
                    <input type="number" class="form-control" name="id" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="tags_id">&nbsp; &nbsp;</label>
                    <button type="submit" id="submit" class="btn btn-success" style="width: 100%" onclick="return confirm('Are you Sure??\nYou Want to Delete this item!');">Delete</button>
                </div>
            </div>
        </div>
    </form>
    <br/>
    <h3>Delete Data Output:</h3>
    <div id="item-list">

    </div>

</div>

<script>
    $(document).on('submit', '#saveInfo', function (e) {

        var formData = new FormData($("#saveInfo")[0]);
        e.preventDefault();

        $.ajax({
            type: "DELETE",
            url: base_url + '/pet/delete',
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    $('#item-list').html('<div class="alert alert-success" role="alert">Update Success!!</div>');
                } else {
                    $('#item-list').html('<div class="alert alert-danger" role="alert">Data not found!!</div>');
                }
            },
            error: function (xhr, err) {
                $('#item-list').html('<div class="alert alert-danger" role="alert">Data not found!!</div>');
            }
        });
    });

</script>
@endsection