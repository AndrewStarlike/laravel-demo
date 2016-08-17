            <div class="row">
                <div class="col-lg-6">
                    {{ Form::model($virus, ['route' => [$route, $virus->id], 'method' => 'post', 'role' => 'form']) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', $virus->name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Description:') }}
                            {{ Form::textarea('description', $virus->description, ['class' => 'form-control', 'rows' => 5]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('discovered_at', 'Discovery date:') }}
                            <div class='input-group date' id='discovered_at'>
                                {{ Form::text('discovered_at', $virus->discovered_at->format('m/d/Y h:i A'), ['class' => 'form-control']) }}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="checkbox">
                                <label>{{ Form::checkbox('active') }}Active?</label>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>