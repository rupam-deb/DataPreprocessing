@extends('app')




@section('content')
<div class="container">
    <h2>Find pet by ID</h2>
    <form id="saveInfo" method="post">
        <div class="row">
            @csrf
            <div class="col-md-3">
                <div class="form-group">
                    <label for="id">petId:</label>
                    <input type="number" class="form-control" name="id" min="1" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="tags_id">&nbsp; &nbsp;</label>
                    <button type="submit" id="submit" class="btn btn-success" style="width: 100%">Find</button>
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
            url: base_url + '/pet/find',
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                $('#item-list').html(' ');
                if (response.status == 200) {

                } else {
                    $('#item-list').html('<div class="alert alert-danger" role="alert"><strong>'+response.status+'</strong> ' + response.data.message + '</div>');
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