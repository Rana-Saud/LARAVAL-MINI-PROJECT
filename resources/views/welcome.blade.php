    @include('layouts.header')
    @include('layouts.nav')

    <section class="tables-page-section mt-5"="service">
        <div class="container">
            @include('layouts.messages')
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="section_title text-center">
                        <h2>Existing Users</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-secondary shadow rounded">
                            <thead class="">
                                <th>ID</th>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            @foreach ($users as $user)
                                <tr class="@if ($user->id == Auth::user()->id) ? {{ 'table-success' }} : null @endif">
                                    <th>{{ $user->id }}</th>
                                    <td>{!! $user->getImage(30, 30) !!}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>
                                        <span
                                            class="badge @if ($user->id == Auth::user()->id) {{ 'bg-success' }} @else {{ 'bg-danger' }} @endif">
                                            @if ($user->id == Auth::user()->id)
                                                {{ 'Active' }}
                                            @else
                                                {{ 'Inactive' }}
                                            @endif
                                        </span>
                                    <td>
                                        <a href="{{ url('user') . '/' . $user->id }}" type="button"
                                            class="btn btn-warning btn-sm"><img src="{{ asset('icons/eye-fill.svg') }}"
                                                alt="" srcset="">
                                        </a>
                                        <a href="{{ url('user/edit') . '/' . $user->id }}" type="button"
                                            class="btn btn-success btn-sm">
                                            <img src="{{ asset('icons/pencil-square.svg') }}" alt=""
                                                srcset="">
                                        </a>
                                        <a href="{{url('user/delete') . '/' . $user->id }}" type="button"
                                            class="btn btn-danger btn-sm">
                                            <img src="{{ asset('icons/trash-fill.svg') }}" alt=""
                                                srcset="">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{-- search and pagination --}}
                    {!! $users->appends(['search' => request('search')])->links() !!}
                </div>
            </div>
        </div>
    </section>
    @include('delete-modal')
    @include('layouts/footer')
