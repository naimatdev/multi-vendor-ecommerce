
<div class="form-group">
                                <label for="parent_id">mai__ Category</label>
                                <select name ="parent_id" class="form-control">
                             <option   value="0" @if(isset($category['parent_id']) && $category['parent_id']==0) selected ="" @endif>main category</option>
                             @if(!empty($getCategories))
                             @foreach($getCategories as $parent_category)
                            <option  value= "{{$parent_category['id']}}" @if(isset($parent_category['parent_id']) && $parent_category['parent_id']==$parent_category['id']) selected ="" @endif>{{$parent_category['category_name']}}</option>
                            
                            @if(!empty($category['subCategories']))
                             @foreach($category['subCategories'] as $subCategory)
                            <option  value= "{{$subCategory_id['id']}}" @if(isset($parent_category['parent_id']) && $parent_category['parent_id']==$subCategory['id']) selected ="" @endif>&nbsp;&raquo;&nbsp;{{$subCategory['category_name']}}</option>
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                                </select>
                            </div>