<form class="form-horizontal"
      role="form" method="POST"
      action="{{ route('building.store' ) }}"
>

    {!! csrf_field() !!}


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Building Info</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-horizontal" role="form">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Address Details</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Name </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" placeholder="Address Line 1"
                                           class="form-control">
                                </div>
                            </div>


                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Line 1</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address1" placeholder="Address Line 1"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Line 2</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address2" placeholder="Address Line 2"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">City</label>
                                <div class="col-sm-10">
                                    <input type="text" name="city" placeholder="City" class="form-control">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">State</label>
                                <div class="col-sm-4">
                                    <input type="text" name="state" placeholder="State" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                                <div class="col-sm-4">
                                    <input type="text" name="postal_code" placeholder="Post Code" class="form-control">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <div class="controls">
                                        <select id="country" name="country_id" class="form-control">
                                            <option value="" selected="selected">(please select a country)</option>

                                            @foreach(Countries::getlist('name') as $country)
                                                <option value="{{$country['country-code']}}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

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
                    </form>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row --
            </div>
        </div>
    </div>


</form>