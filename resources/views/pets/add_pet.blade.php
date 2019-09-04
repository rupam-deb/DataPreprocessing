@extends('app')




@section('content')
<div class="container">
    <h2>Add a new pet to the store</h2>
    <form id="saveInfo" method="post">
        <div class="row">
            @csrf
            <div class="col-md-3">
                <div class="form-group">
                    <label for="id">Pet Id:</label>
                    <input type="number" class="form-control" name="id" min="1" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Pet Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cat_id">Category Id:</label>
                    <input type="number" class="form-control" name="cat_id" min="1" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cat_name">Category Name:</label>
                    <input type="text" class="form-control" name="cat_name" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control" required>
                        <option value="available">Available</option>
                        <option value="pending">Pending</option>
                        <option value="sold">Sold</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tags_id">Tags Id:</label>
                    <input type="number" class="form-control" name="tags_id" min="1" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tags_id">Tags Name:</label>
                    <input type="text" class="form-control" name="tags_name" required>
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
            url: base_url + '/pet/store',
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                $('#item-list').html(' ');
                
                if (response.status == 200) {

                } else {
                    $('#item-list').html('<div class="alert alert-danger" role="alert"><strong>' + response.status + '</strong> ' + response.data.message + '</div>');
                }
                output(JSON.stringify(response.data, undefined, 2));
            }
        });
    });


    function output(inp) {
        document.getElementById("item-list").appendChild(document.createElement('pre')).innerHTML = inp;
    }

</script>
@endsection