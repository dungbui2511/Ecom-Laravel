<div>
    <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                           Edit Coupon
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">All Coupon</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success_message')}}
                    </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateCoupon">
                        <div class="form-group">
                            <label class="col-md-4 control-lable">Coupon Code</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Coupon Code" wire:model="code" class="form-control input-md" />
                                @error('code') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-lable">Coupon Type</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="type">
                                    <option value="">Select</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>
                                </select>
                                @error('type') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-lable">Coupon Value</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Coupon Value" wire:model="value" class="form-control input-md" />
                                @error('value') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-lable">Cart Value</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Cart Value" wire:model="cart_value" class="form-control input-md" />
                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
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
