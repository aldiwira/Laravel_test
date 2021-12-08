@extends('template')

@section('title')
Admin
@endsection

@section('body')
<div class="container">
    <div class="d-flex justify-content-between">
        <h4>Users</h4>
        <div class="my-2">
            <a type="button" class="btn btn-primary" href="{{route('admin.create')}}">New</a>
            <a type="button" class="btn btn-danger" href="{{route('logout')}}">Logout</a>
        </div>
    </div>
    @include('alertsession')
    <table class="table my-4">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">
                </th>
            </tr>
        </thead>
        <tbody id="wrapperbody">
        </tbody>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><button id="prev" class="page-link">Previous</button></li>
            <li class="page-item"><button id="next" class="page-link">Next</button></li>
        </ul>
    </nav>
</div>
@endsection

@section('js')
<script>
    let current = 1;
    const token = "Bearer {{Session::get('token')[0]}}";
    $(document).ready(() => {
        updateData()
    })

    function updateData() {
        $.ajax({
            url: `{{route('api.users.index')}}?page=${current}`,
            method: "GET",
            headers: {"Authorization": token},
            success: (data)=> {
                updateRow(data)
                listenBtn(data.meta.last_page)
            }
        })
    }

    function updateRow(data) {
        $("#wrapperbody").empty();
        let row = "";
        data.data.map((v, i) => {
            row += `<tr>
                <th scope="row">${v.id}</th>
                <td>${v.name}</td>
                <td>${v.email}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm">Update</button>
                    <button type="button" onClick="onDelete(${v.id})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>`
        });
        $("#wrapperbody").append(row);
    }

    function onDelete(id) {
        $.ajax({
            url: `{{route('api.users.index')}}/${id}`,
            method: "DELETE",
            headers: {"Authorization": token},
            success: (data)=> {
                updateData()
                alert("success delete user")
            }
        })
    }

    function listenBtn(last) {
        $("#next").on('click', ()=> {
            if (current+1 >= 1) {
                current = current + 1;
                updateData();    
            }
        });
        $("#prev").on('click', ()=> {
            if (current-1 >= 1) {
                current = current - 1;
                updateData();    
            }
        });
    }
</script>
@endsection