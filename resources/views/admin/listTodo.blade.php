<div style="background-color: #fff;" id="todoList">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="padding: 20px 20px 20px 20px">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-incomplete-tab" data-bs-toggle="pill"
                data-bs-target="#pills-incomplete" type="button" role="tab">Incomplete</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-complete-tab" data-bs-toggle="pill"
                data-bs-target="#pills-complete" type="button" role="tab">Completed</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-complete-tab" data-bs-toggle="pill"
                data-bs-target="#pills-all" type="button" role="tab">All</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-incomplete" role="tabpanel"
            aria-labelledby="pills-incomplete-tab">
            <div style="padding: 25px">
                <table class="table table-responsive overflow-auto cell-border hover todo-table"
                    id="table_id">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Id</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $number=0;
                        @endphp
                        @foreach ($todoUser as $todo)
                        <tr>
                            @php
                            $number++
                            @endphp
                            <td>{{ $number }}</td>
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->content }}</td>
                            <td>
                                <a type="submit" class="btn btn-primary" onclick="CheckDone({{ $todo->id }})"
                                    >Done</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-complete" role="tabpanel"
            aria-labelledby="pills-complete-tab">
            <div style="padding: 25px">
                <table class="table table-responsive overflow-auto cell-border hover todo-table"
                    id="table_done">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $number=0;
                        @endphp
                        @foreach ($todoDone as $todo)
                        <tr>
                            @php
                            $number++
                            @endphp
                            <td>{{ $number }}</td>
                            <td>{{ $todo->content }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-all" role="tabpanel"
            aria-labelledby="pills-complete-tab">
            <div style="padding: 25px">
                <table class="table table-responsive overflow-auto cell-border hover todo-table"
                    id="table_all">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>User</th>
                            <th>Todo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $number=0;
                        @endphp
                        @foreach ($todoUserDone as $todo)
                        <tr>
                            @php
                            $number++
                            @endphp
                            <td>{{ $number }}</td>
                            <td>{{ $todo->userRelation->name }}</td>
                            <td>{{ $todo->todoListRelation->content }}</td>
                            <td>@if ($todo->is_done==0)
                                <button type="button" class="btn btn-danger">Not Done</button>
                                @else
                                <button type="button" class="btn btn-success">Done</button>
                            @endif</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('BackEnd/js/todolist.js') }}"></script>
