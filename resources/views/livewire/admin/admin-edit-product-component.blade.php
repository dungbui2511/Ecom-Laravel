<div>
    <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edit Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Name</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generatesSlug" />
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Slug</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug" />
                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Short Description</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Regular Price</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price" />
                                @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sale Price</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price" />
                                @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
                                @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Stock</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">InStock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                                @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Featured</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('featured') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                                @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Image</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="newimage" />
                                @if($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" width="120" alt="">
                                @else
                                <img src="{{asset('assets/images/products/'.$image)}}" alt="">
                                @endif
                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Product Gallery</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" wire:model="newimages" multiple/>
                                @if($newimages)
                                @foreach($newimages as $newimage)
                                    @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" width="120" alt="">
                                    @endif
                                @endforeach
                                @else
                                @foreach($images as $image)
                                @if($image)
                                <img src="{{asset('assets/images/products/'.$image)}}" alt="">
                                @endif
                                @endforeach
                                @endif
                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id" wire:model="changeSubcategory">
                                    <option value="">Select Category</option>
                                   @foreach($categories as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                </select>
                                @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sub Category</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="scategory_id">
                                    <option value="0">Select Category</option>
                                   @foreach($scategories as $scategory)
                                   <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                   @endforeach
                                </select>
                                @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
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
@push('scripts')
<script>
    $(function(){
        tinymce.init({
            selector:'textarea#short_description',
            setup:function(editor){
                editor.on('change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description', sd_data);
                })
            }
        });
        tinymce.init({
            selector:'textarea#description',
            setup:function(editor){
                editor.on('change',function(e){
                    tinyMCE.triggerSave();
                    var d_data = $('#description').val();
                    @this.set('description',d_data);
                })
            }
        });
    })
</script>
@endpush