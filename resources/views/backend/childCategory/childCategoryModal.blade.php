<!-- Modal -->


<div class="modal fade" id="childCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{route('add.childCategory')}}" method="post">
            @csrf
            <div class="modal-content">
                @include('error')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sub Category Add Page</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select id="category_id" name="category_id" class="form-control my-2">
                            @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subCategory_id">Sub Category Name</label>
                        <select id="subCategory_id" name="subCategory_id" class="form-control my-2">
                            @foreach($subCategory as $item1)
                            <option value="{{$item1->id}}">{{$item1->sub_category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="child_category_name">Child Category Name</label>
                        <input type="text" id="child_category_name" name="child_category_name"
                            placeholder="Child Category Name" class="form-control my-2" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </div>
        </form>
    </div>
</div>