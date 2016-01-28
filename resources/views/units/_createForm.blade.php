<form class="form-horizontal"
      role="form" method="POST"
      action="{{ route('building.unit.store', $building->id ) }}"
>

    {!! csrf_field() !!}


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $building->name }} Unit Info</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="form-horizontal" role="form">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Unit Details</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Name </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" placeholder="Name"
                                           class="form-control">
                                </div>
                            </div>


                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Address or unit number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" placeholder="Address Line 1"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Square footage</label>
                                <div class="col-sm-10">
                                    <input type="number" name="sq_ft" placeholder="sq. ft"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="description" class="form-control"></textarea>
                                </div>
                            </div>

                            @if($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div><!-- /.col-lg-10 -->
            </div><!-- /.row -->
        </div>
    </div>
</form>