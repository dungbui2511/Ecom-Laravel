<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
   <div class="container" style="padding: 30px 0;">
   <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Categories
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>Id</tr>
                        <th>Category</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   </div>
    </div>
</div>
