<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">This is a panel</div>

        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST"
                  action="{{ route('portfolio.store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="portfolioName" class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="portfolioName" class="form-control"
                               required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Description:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="description" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-success">Create Portfolio</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>