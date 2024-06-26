<div>
    <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Category
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All Categories</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="storeCategory">
                        <div class="form-group">
                            <label class="col-md-4 control-lable">Category Name</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Category Name" wire:model="name" class="form-control input-md" wire:keyup="generateslug" />
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-lable">Category Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Category Slug" wire:model="slug" class="form-control input-md" />
                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-lable">Parent Category</label>
                            <div class="col-md-4">
                                <select class="form-control input-md" wire:model="category_id">
                                    <option value="">None</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-lable"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
