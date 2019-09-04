@extends('app')




@section('content')
<div class="container">
    <h2>Finds Pets by status</h2>
    <form id="saveInfo" method="post" action="{{ url('pet/findByStatus') }}">
        <div class="row">
            @csrf

            <div class="col-md-3">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control" required>
                        <option value="available" {{ (@$_POST['status'] == 'available') ? 'selected' : '' }} >Available</option>
                        <option value="pending" {{ (@$_POST['status'] == 'pending') ? 'selected' : '' }}>Pending</option>
                        <option value="sold" {{ (@$_POST['status'] == 'sold') ? 'selected' : '' }} >Sold</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tags_id">&nbsp; &nbsp;</label>
                    <button type="submit" id="submit" class="btn btn-success" style="width: 100%">Execute</button>
                </div>
            </div>
        </div>
    </form>
    <br/>
    <h3>Output:</h3>
    <div id="item-list">
        <?php
        if ($response) {
            print "<pre>";
            print_r(json_encode($response, JSON_PRETTY_PRINT));
            print "</pre>";
        }
        ?>
    </div>

</div>

@endsection